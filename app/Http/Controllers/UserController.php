<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function list()
    {
        $this->authorize('list',User::class);
        return $this->userRepository->list();
    }

    public function create(StoreUserRequest $request)
    {
        $user = auth('sanctum')->user();
        $this->authorize('create',User::class);
        return $this->userRepository->create($request->validated(), $user);
    }

    public function findById(int $id)
    {
        $this->authorize('findById',User::class);
        return $this->userRepository->findById($id);
    }

    public function update(int $id, UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return $this->userRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);
        return $this->userRepository->delete($id);
    }
}
