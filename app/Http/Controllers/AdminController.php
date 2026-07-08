<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);

        return redirect()->back();
    }
}
