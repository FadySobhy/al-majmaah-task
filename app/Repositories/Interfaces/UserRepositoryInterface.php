<?php


namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{

    public function findSocialiteUser($provider, $providerID);

    public function save(User $user);

}
