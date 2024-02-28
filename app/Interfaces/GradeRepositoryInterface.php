<?php

namespace App\Interfaces;

interface GradeRepositoryInterface
{
    public function list();
    public function findById(int $gradeId);
    public function create(array $details);
    public function update(int $gradeId, array $details);
    public function delete(int $gradeId);

}
