<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\User;
use App\Repositories\CommentRepository;
use App\Services\CommentService;
use App\Traits\API;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $commentService;

    public function __construct()
    {
        $this->commentService = new CommentService(new CommentRepository());
    }
    public function create(CommentRequest $request)
    {
        $data['user_id'] = User::wherePin($request['user_pin'])->first()->id;
        $data['parent_id'] = $request['parent_id'] ?? null;
        $data['post_id'] = $request['post_id'];
        $comment = $this->commentService->create($request->except('attachment') + $data);
        if ($request->hasFile('attachment')) {

            $comment->addMediaFromRequest('attachment')->toMediaCollection('comment_attachments');
        }
        return (new API)
            ->isOk(__('Comment created Successful.'))
            ->setData(['comment_id' => $comment->id])
            ->build();
    }
}
