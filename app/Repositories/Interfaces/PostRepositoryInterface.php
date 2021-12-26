<?php


namespace App\Repositories\Interfaces;


use App\Models\Post;

interface PostRepositoryInterface
{
    public function save(Post $post);

    public function all();

    public function userPosts($userID);
}
