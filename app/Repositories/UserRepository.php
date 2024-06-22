<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface
{
    public function list()
    {
        $users = User::paginate(10);
        if ($users->isEmpty()) {
            return Helper::responseData('No users found', false, null, 404);
        }
        return Helper::responseData('Users found', true, UserResource::collection($users), 200);
    }

    public function findById(int $userId)
    {
        try {
            $user = User::findOrFail($userId);
            return Helper::responseData('Success', true, UserResource::make($user), 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('User not found', false, null, 404);
        }
    }

    public function create(array $details)
    {
        $user = User::create($details);
        return Helper::responseData('User added successfully', true, new UserResource($user), 200);
    }

    public function update(int $userId, array $details)
    {
        User::where('id', $userId)->update($details);
        $user = User::find($userId);
        return Helper::responseData('User updated successfully', true, new UserResource($user), 200);
    }

    public function delete(int $userId)
    {
        try {
            $user = User::findOrFail($userId);
            $user->delete();
            return Helper::responseData('User deleted successfully', true, null, 200);
        } catch (ModelNotFoundException $e) {
            return Helper::responseData('User not found', false, null, 404);
        }
    }
}
