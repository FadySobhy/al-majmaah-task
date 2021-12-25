<?php


namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteService
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function redirect($provider) {
        return $this->callSocialiteProvider($provider)->redirect();
    }

    public function callback($provider) {

        try {
            $socialiteUser = $this->callSocialiteProvider($provider)->user();
        } catch (\Exception $e) {
            return $this->responseData('fails', null);
        }

        $user = $this->userService->checkSocialiteUser($provider, $socialiteUser->getId());

        if (!$user) {
            $validator = $this->userService->validateSocialiteUser($socialiteUser->getEmail());

            if ($validator->fails()){
                return $this->responseData('fails', $validator);
            }

            $user = $this->userService->createSocialiteUser(
                $socialiteUser->getName(),
                $socialiteUser->getEmail(),
                $provider,
                $socialiteUser->getId()
            );
        }

        Auth::login($user);

        return $this->responseData('success', null);
    }

    private function callSocialiteProvider($provider) {
        return Socialite::driver($provider);
    }

    private function responseData($key, $value) {
        return [
            'key' => $key,
            'value' => $value
        ];
    }

}
