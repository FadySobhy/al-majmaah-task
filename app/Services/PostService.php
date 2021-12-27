<?php


namespace App\Services;


use App\Models\Post;
use App\Models\PostImage;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostService
{
    use ControllerTrait;

    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function store(Request $request) {

        return DB::transaction(function () use ($request) {

            $post = new Post($request->validated());
            $post->user_id = auth()->user()->id;
            $this->postRepository->save($post);

            if ($request->images) {
                foreach ($request->images as $image) {
                    PostImage::create([
                        'image' => $this->uploadImage($image, 'uploads/posts'),
                        'post_id' => $post->id
                    ]);
                }
            }

            return $post;
        });
    }

}
