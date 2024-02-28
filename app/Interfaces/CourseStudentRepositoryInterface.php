<?php

namespace App\Interfaces;

interface CourseStudentRepositoryInterface
{
    public function list();
    public function findById(int $id);
    public function create(array $details);
    public function update(int $id, array $details);
    public function delete(int $id);
}
