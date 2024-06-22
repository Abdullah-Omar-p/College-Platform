<?php

namespace App\Interfaces;

interface CommentRepositoryInterface
{
    public function list();
    public function findById(int $commentId);
    public function create(array $details, $user);
    public function update(int $commentId, array $details);
    public function delete(int $commentId);
}
