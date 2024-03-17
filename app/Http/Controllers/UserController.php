<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserRepositoryInterface;
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
        return $this->userRepository->list();
    }

    public function create(StoreUserRequest $request)
    {
        return $this->userRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->userRepository->findById($id);
    }

    public function update(int $id, UpdateUserRequest $request)
    {
        return $this->userRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->userRepository->delete($id);
    }
}
