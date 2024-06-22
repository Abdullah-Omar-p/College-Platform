<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;
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
        $this->authorize('list', Question::class);
        return $this->questionRepository->list();
    }

    public function create(StoreQuestionRequest $request)
    {
        $user = auth('sanctum')->user();
        $this->authorize('create', Question::class);
        return $this->questionRepository->create($request->validated(), $user);
    }

    public function findById(int $id)
    {
        $this->authorize('findById', Question::class);
        return $this->questionRepository->findById($id);
    }

    public function update(int $id, UpdateQuestionRequest $request)
    {
        $question = Question::findOrFail($id);
        $this->authorize('update', $question);
        return $this->questionRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        $question = Question::findOrFail($id);
        $this->authorize('delete', $question);
        return $this->questionRepository->delete($id);
    }
}
