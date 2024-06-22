<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Resources\CommentResource;
use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentRepository implements CommentRepositoryInterface
{

    public function list()
    {
        $posts = Comment::paginate(10);
        if ($posts->isEmpty()) {
            return Helper::responseData('No Comments found', false, null, 404);
        }
        return Helper::responseData('Comments found', true, CommentResource::collection($posts), 200);
    }

    public function findById(int $commentId)
    {
        try {
            $comment = Comment::query()->findOrFail($commentId);
            return Helper::responseData('Success', true, CommentResource::make($comment), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Comment Not Found', false, null, 404);
        }
    }

    public function create(array $details, $user)
    {
        $input = $details;
        $input ['user_id'] = $user->id;
        $comment = Comment::create($input);
        return Helper::responseData('Comment Added Successfully', true, CommentResource::make($comment), 200);
    }

    public function update(int $commentId, array $details)
    {
        Comment::query()->where('id', $commentId)->update($details);
        $comment = Comment::find($commentId);
        return Helper::responseData('Comment Updated Successfully', true, CommentResource::make($comment), 200);
    }

    public function delete(int $commentId)
    {
        try {
            $comment = Comment::findOrFail($commentId);
            $comment->delete();
            return Helper::responseData('Comment Deleted Successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Comment Not Found', false, null, 404);
        }
    }
}
