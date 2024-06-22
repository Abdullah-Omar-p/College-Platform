<?php

namespace App\Interfaces;

interface MediaRepositoryInterface
{
    public function list();
    public function findById(int $mediaId);
    public function create(array $details, $user);
    public function update(int $mediaId, array $details);
    public function delete(int $mediaId);
}
