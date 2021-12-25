<?php

namespace App\Http\Controllers;

use App\Services\SocialiteService;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    private $socialiteService;

    public function __construct(SocialiteService $socialiteService)
    {
        $this->socialiteService = $socialiteService;
    }

    public function redirect($provider) {
        return $this->socialiteService->redirect($provider);
    }

    public function callBack($provider) {
        $response = $this->socialiteService->callback($provider);

        if ($response['key'] == 'fails')
            return redirect()->route('login')->withErrors($response['value']);

        return redirect()->route('home');
    }
}
