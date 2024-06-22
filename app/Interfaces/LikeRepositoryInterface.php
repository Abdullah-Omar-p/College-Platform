<?php

namespace App\Interfaces;

interface LikeRepositoryInterface
{
    public function list();
    public function findById(int $likeId);
    public function create(array $status, $user);
    public function update(int $likeId, array $status);
    public function delete(int $likeId);
}
