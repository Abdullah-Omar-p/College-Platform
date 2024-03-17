<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Resources\PostResource;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostRepository implements PostRepositoryInterface
{
    public function list()
    {
        $posts = Post::paginate(10);
        if ($posts->isEmpty()) {
            return Helper::responseData('No posts found', false, null, 404);
        }
        return Helper::responseData('Posts found', true, $posts, 200);
    }

    public function findById(int $id)
    {
        try {
            $post = Post::query()->findOrFail($id);
            return Helper::responseData('Success', true, PostResource::make($post), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Post Not Found', false, null, 404);
        }
    }

    public function create(array $details)
    {
        $input = $details;
        $input ['prof_id'] = auth('sanctum')->user();
        return Post::create($input);
    }

    public function update(int $id, array $details)
    {
        Post::query()->where('id', $id)->update($details);
        $post = Post::find($id);
        return $post;
    }

    public function delete(int $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            return Helper::responseData('Post Deleted Successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('Post Not Found', false, null, 404);
        }
    }

    private function query()
    {
    }
}
