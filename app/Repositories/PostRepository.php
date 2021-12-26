<?php


namespace App\Repositories;


use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function save(Post $post)
    {
        return $post->save();
    }

    public function all()
    {
        return Post::with('images')
            ->latest()
            ->paginate(6);
    }

    public function userPosts($userID)
    {
        return Post::with('images')
            ->where('user_id', $userID)
            ->latest()
            ->paginate(6);
    }

}
