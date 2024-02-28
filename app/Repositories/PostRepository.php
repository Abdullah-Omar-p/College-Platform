<?php

namespace App\Repositories;

use App\Helpet\Helper;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Http;

class PostRepository implements PostRepositoryInterface
{
    public function list()
    {
        $posts = Post::paginate(10);
        if ($posts->isEmpty()) {
            return Helper::responseData('No posts found', false, null, 404);
        }
        $posts->appends(['key' => 'value']);
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
        return Post::create($details);
    }

    public function update(int $id, array $details)
    {
        return Post::query()->where('id', $id)->update($details);
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
}
