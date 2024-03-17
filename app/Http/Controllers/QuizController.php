<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Interfaces\QuizRepositoryInterface;
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
        return $this->quizRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->quizRepository->findById($id);
    }

    public function update(UpdateQuizRequest $request, int $id)
    {
        return $this->quizRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->quizRepository->delete($id);
    }
}
