<?php


namespace App\Repositories;


use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function findSocialiteUser($provider, $providerID)
    {
        return User::where([
            'provider'      => $provider,
            'provider_id'   => $providerID
        ])->first();
    }

    public function save(User $user)
    {
        return $user->save();
    }

}
