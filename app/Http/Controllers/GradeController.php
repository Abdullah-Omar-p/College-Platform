<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Interfaces\GradeRepositoryInterface;
use App\Models\Grade;
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
        $this->authorize('list',Grade::class);
        return $this->gradeRepository->list();
    }

    public function studentGrades()
    {
        $user = auth('sanctum')->user();
        $this->authorize('studentGrades',Grade::class);
        return $this->gradeRepository->studentGrades($user);
    }

    public function create(StoreGradeRequest $request)
    {
        $this->authorize('create', Grade::class);
        return $this->gradeRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        $this->authorize('findById',Grade::class);
        return $this->gradeRepository->findById($id);
    }

    public function update( int $id, UpdateGradeRequest $request)
    {
        $grade = Grade::findOrFail($id);
        $this->authorize('update', $grade);
        return $this->gradeRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        $grade = Grade::findOrFail($id);
        $this->authorize('delete', $grade);
        return $this->gradeRepository->delete($id);
    }
}
