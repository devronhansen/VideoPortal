<?php

namespace App;


class SocialAccountService
{
    public function createOrGetUser($id, $name, $email)
    {
        $account = SocialAccount::whereProvider('office365')
            ->whereProviderUserId($id)
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $id,
                'provider' => 'office365'
            ]);

            $user = User::whereEmail($email)->first();

            if (!$user) {
                $user = User::create([
                    'email' => $email,
                    'name' => $name,
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}