<?php

namespace App\Interfaces;

interface QuizRepositoryInterface
{
    public function list();
    public function findById(int $id);
    public function create(array $details, $user);
    public function update(int $id, array $details);
    public function delete(int $id);
}
