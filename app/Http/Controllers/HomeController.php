<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index() {
        return view('home', [
            'posts' => $this->postRepository->all()
        ]);
    }

    public function myPosts() {
        return view('user_posts', [
            'posts' => $this->postRepository->userPosts(auth()->user()->id)
        ]);
    }
}
