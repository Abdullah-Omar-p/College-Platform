<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Controllers\MediaController;
use App\Http\Resources\PostResource;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class PostRepository implements PostRepositoryInterface
{
    public function list()
    {
        $posts = Post::with('media')->paginate(10);
        if ($posts->isEmpty()) {
            return Helper::responseData('No posts found', false, null, 404);
        }
        return Helper::responseData('Posts found', true, PostResource::collection($posts), 200);
    }

    public function findById(int $id)
    {
        try {
            $post = Post::query()->with('media')->findOrFail($id);
            return Helper::responseData('Success', true, PostResource::make($post), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Post Not Found', false, null, 404);
        }
    }

    public function create(array $details, $user)
    {
        $input = $details;
        $input ['prof_id'] = $user->id;
        $post = Post::create($input);
        $mimeType = $details['media']->getMimeType();
        if (isset($details['media'])) {
            MediaController::saveMedia($details, $mimeType, $post, Post::class);
        }
        $post->load('media');
        return Helper::responseData('Post Added Successfully', true, PostResource::make($post), 200);

    }

    public function update(int $id, array $details)
    {
        $post = Post::findOrFail($id);
        $post->update($details);
        $post->load('media');
        if (isset($details['media'])) {
            $mimeType = $details['media']->getMimeType();
            MediaController::updateMedia($details, $mimeType, $post, Post::class, $id);
        }
        return Helper::responseData('Post Updated Successfully', true, PostResource::make($post), 200);
    }

    public function delete(int $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            MediaController::removeMedia($post->id, Post::class);
            return Helper::responseData('Post Deleted Successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Post Not Found', false, null, 404);
        }
    }

    private function query()
    {
    }
}
