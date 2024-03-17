<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Interfaces\GradeRepositoryInterface;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    private GradeRepositoryInterface $gradeRepository;
    public function __construct(GradeRepositoryInterface $gradeRepository)
    {
        $this->gradeRepository = $gradeRepository;
    }
    public function list()
    {
        return $this->gradeRepository->list();
    }

    public function create(StoreGradeRequest $request)
    {
        return $this->gradeRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->gradeRepository->findById($id);
    }

    public function update( int $id, UpdateGradeRequest $request)
    {
        return $this->gradeRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->gradeRepository->delete($id);
    }
}
