<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Services\PostService;
use App\Traits\API;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    protected $postService;

    public function __construct()
    {
        $this->postService = new PostService(new PostRepository());
    }

    public function create(PostRequest $request)
    {
        $data['user_id'] = User::wherePin($request['user_pin'])->first()->id;
        $post = $this->postService->create($request->except('attachment') + $data);
        if ($request->hasFile('attachment')) {

            $post->addMediaFromRequest('attachment')->toMediaCollection('post_attachments');
        }
        return (new API)
            ->isOk(__('Post created Successful.'))
            ->setData(['post_id' => $post->id])
            ->build();
    }
}
