<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class UserService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function checkSocialiteUser($provider, $providerID) {
        return $this->userRepository->findSocialiteUser($provider, $providerID);
    }

    public function validateSocialiteUser($email) {
        return Validator::make(
            ['email' => $email],
            ['email' => ['unique:users,email']],
            ['email.unique' => 'Couldn\'t log in. We have this email already!']
        );
    }

    public function createSocialiteUser($name, $email, $provider, $providerID) {
        $user = new User([
            'name' => $name,
            'email' => $email,
            'provider' => $provider,
            'provider_id' => $providerID
        ]);
        $user->email_verified_at = now();
        $this->userRepository->save($user);

        return $user;
    }
}
