<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Resources\LikeResource;
use App\Interfaces\LikeRepositoryInterface;
use App\Models\Like;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LikeRepository implements LikeRepositoryInterface
{
    public function list()
    {
        $likes = Like::paginate(10);
        if ($likes->isEmpty()) {
            return Helper::responseData('No Likes found', false, null, 404);
        }
        return Helper::responseData('Likes found', true, LikeResource::collection($likes), 200);
    }

    public function findById(int $likeId)
    {
        try {
            $like = Like::query()->findOrFail($likeId);
            return Helper::responseData('Success', true, LikeResource::make($like), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Like Not Found', false, null, 404);
        }
    }

    public function create(array $details, $user)
    {
        $input = $details;
        $input['student_id'] = $user->id;
        // .. Check If User Already React This->post ..
        $existingLike = Like::where('student_id', $user->id)
            ->where('post_id', $input['post_id'])
            ->first();
        if ($existingLike) {
            // .. User Has Already Reacted To This Post ..
            return Helper::responseData('You have already reacted to this post', false, null, 400);
        }
        $like = Like::create($input);
        return Helper::responseData('Like Added Successfully', true, LikeResource::make($like), 200);
    }

    public function update(int $likeId, array $details)
    {
        Like::query()->where('id', $likeId)->update($details);
        $like = Like::find($likeId);
        return Helper::responseData('Like Updated Successfully', true, LikeResource::make($like), 200);
    }

    public function delete(int $likeId)
    {
        try {
            $like = Like::findOrFail($likeId);
            $like->delete();
            return Helper::responseData('Like Deleted Successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Like Not Found', false, null, 404);
        }
    }
}
