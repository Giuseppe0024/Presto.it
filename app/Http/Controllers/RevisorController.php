<?php

namespace App\Http\Controllers;

use App\Http\Requests\becomeMailRequest;
use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\ArticleRevision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::whereNull('is_accepted')
            ->when($this->restrictionsEnabled(), fn ($query) => $query->where('user_id', '!=', auth()->id()))
            ->first();

        /* Prima si smaltiscono i nuovi annunci, poi le modifiche a quelli già online. */
        $revision_to_check = $article_to_check
            ? null
            : ArticleRevision::with(['article.user', 'category'])
                ->when($this->restrictionsEnabled(), fn ($query) => $query->whereHas(
                    'article',
                    fn ($article) => $article->where('user_id', '!=', auth()->id()),
                ))
                ->first();

        return view('revisor.index', compact('article_to_check', 'revision_to_check'));
    }

    public function accept(Article $article)
    {
        if ($this->isOwnArticle($article)) {
            return redirect()->back()->with('error', "Non puoi approvare l'annuncio ".$article->title.' perché ne sei l\'autore');
        }

        $article->setAccepted(true);

        return redirect()->back()->with('message', "Hai accettato l'articolo ".$article->title);
    }

    public function reject(Article $article)
    {
        if ($this->isOwnArticle($article)) {
            return redirect()->back()->with('error', "Non puoi rifiutare l'annuncio ".$article->title.' perché ne sei l\'autore');
        }

        $article->setAccepted(false);

        return redirect()->back()->with('message', "Hai rifiutato l'articolo ".$article->title);
    }

    public function acceptRevision(Request $request, ArticleRevision $revision)
    {
        if ($this->isOwnRevision($revision)) {
            return redirect()->back()->with('error', 'Non puoi approvare le modifiche all\'annuncio '.$revision->article->title.' perché ne sei l\'autore');
        }

        if (! $this->tokenMatches($request, $revision)) {
            return redirect()->back()->with('error', __('ui.revisionChanged'));
        }

        $title = $revision->article->title;

        $revision->approve();

        return redirect()->back()->with('message', 'Hai accettato le modifiche all\'annuncio '.$title);
    }

    public function rejectRevision(Request $request, ArticleRevision $revision)
    {
        if ($this->isOwnRevision($revision)) {
            return redirect()->back()->with('error', 'Non puoi rifiutare le modifiche all\'annuncio '.$revision->article->title.' perché ne sei l\'autore');
        }

        if (! $this->tokenMatches($request, $revision)) {
            return redirect()->back()->with('error', __('ui.revisionChanged'));
        }

        $title = $revision->article->title;

        $revision->reject();

        return redirect()->back()->with('message', 'Hai rifiutato le modifiche all\'annuncio '.$title);
    }

    private function restrictionsEnabled(): bool
    {
        return (bool) config('app.revisor_restrictions');
    }

    private function isOwnArticle(Article $article): bool
    {
        return $this->restrictionsEnabled() && (int) $article->user_id === (int) auth()->id();
    }

    private function isOwnRevision(ArticleRevision $revision): bool
    {
        return $this->restrictionsEnabled() && (int) $revision->article->user_id === (int) auth()->id();
    }

    /*
    L'autore può sostituire la revisione mentre il revisore la sta guardando: senza
    questo controllo il click approverebbe un contenuto mai visto da chi lo approva.
    */
    private function tokenMatches(Request $request, ArticleRevision $revision): bool
    {
        $token = $request->input('token');

        return is_string($token) && hash_equals($revision->token, $token);
    }

    public function become()
    {
        return view('revisor.become');
    }

    public function becomeMail(becomeMailRequest $request)
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(
            Auth::user(),
            $request->validated('why'),
            $request->validated('pastExperience'),
            $request->file('curriculum'),
        ));

        return redirect()->route('homepage')->with('message', 'Richiesta per diventare revisor inviata');
    }
}
