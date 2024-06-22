<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Interfaces\QuizRepositoryInterface;
use App\Models\Quiz;
use function Termwind\renderUsing;

class QuizController extends Controller
{
    private QuizRepositoryInterface $quizRepository;
    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }
    public function list()
    {
        return $this->quizRepository->list();
    }

    public function create(StoreQuizRequest $request)
    {
        $user = auth('sanctum')->user();
        $this->authorize('create', Quiz::class);
        return $this->quizRepository->create($request->validated(),$user);
    }

    public function findById(int $id)
    {
        $this->authorize('findById', Quiz::class);
        return $this->quizRepository->findById($id);
    }

    public function update(int $id, UpdateQuizRequest $request)
    {
        $quiz = Quiz::findOrFail($id);
        $this->authorize('update', $quiz);
        return $this->quizRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        $quiz = Quiz::findOrFail($id);
        $this->authorize('delete', $quiz);
        return $this->quizRepository->delete($id);
    }
}
