<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function list();
    public function findById(int $userId);
    public function create(array $details);
    public function update(int $userId, array $details);
    public function delete(int $userId);
}
