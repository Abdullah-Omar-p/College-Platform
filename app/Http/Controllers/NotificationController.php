<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Interfaces\NotificationRepositoryInterface;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private NotificationRepositoryInterface $notificationRepository;
    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }
    public function list()
    {
        return $this->notificationRepository->list();
    }

    public function create(StoreNotificationRequest $request)
    {
        return $this->notificationRepository->create($request->validated());
    }

    public function findById(int $id)
    {
        return $this->notificationRepository->findById($id);
    }

    public function update(int $id, UpdateNotificationRequest $request)
    {
        return $this->notificationRepository->update($id, $request->validated());
    }

    public function delete(int $id)
    {
        return $this->notificationRepository->delete($id);
    }
}
