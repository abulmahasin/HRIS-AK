<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserActivationToken;
use Illuminate\Support\Str;

class UserActivationService
{
    public static function createActivation(User $user)
    {
        $token = Str::random(64);

        UserActivationToken::updateOrCreate(
            ['user_id' => $user->id],
            [
                'token' => $token,
                'expires_at' => now()->addHours(24)
            ]
        );

        return $token;
    }
}
