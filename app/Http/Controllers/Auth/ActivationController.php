<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function sendActivationLink(User $user)
    {
        $token = Str::random(64);

        $user->activationToken()->delete(); // hapus token lama

        $user->activationToken()->create([
            'token' => $token,
            'expires_at' => now()->addDay(),
        ]);

        Mail::to($user->email)->send(new ActivationMail($token));

        return back()->with('success', 'Link aktivasi telah dikirim!');
    }

}
