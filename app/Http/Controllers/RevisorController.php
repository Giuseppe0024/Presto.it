<?php

namespace App\Http\Controllers;

use App\Http\Requests\becomeMailRequest;
use App\Mail\BecomeRevisor;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->where('user_id', '!=', auth()->id())->first();

        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        //        if ($article->user_id = auth()->id()) {
        //            return redirect()->back()->with('error', "Non puoi approvare l'annuncio".$article->title."perché ne sei l'autore");
        //        }

        $article->setAccepted(true);

        return redirect()->back()->with('message', "Hai accettato l'articolo ".$article->title);
    }

    public function reject(Article $article)
    {
        //        if ($article->user_id = auth()->id()) {
        //            return redirect()->back()->with('error', "Non puoi rifiutare l'annuncio".$article->title."perché ne sei l'autore");
        //        }

        $article->setAccepted(false);

        return redirect()->back()->with('message', "Hai rifiutato l'articolo ".$article->title);
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
