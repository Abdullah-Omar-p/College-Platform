<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Interfaces\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private QuestionRepositoryInterface $questionRepository;
    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }
    public function list()
    {
        return $this->questionRepository->list();
    }

    public function create(StoreQuestionRequest $request)
    {
        return $this->questionRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->questionRepository->findById($id);
    }

    public function update(int $id, UpdateQuestionRequest $request)
    {
        return $this->questionRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->questionRepository->delete($id);
    }
}
