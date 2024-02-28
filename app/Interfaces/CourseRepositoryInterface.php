<?php

namespace App\Interfaces;

interface CourseRepositoryInterface
{
    public function list();
    public function findById(int $courseId);
    public function create(array $details);
    public function update(int $courseId, array $details);
    public function delete(int $courseId);
}
