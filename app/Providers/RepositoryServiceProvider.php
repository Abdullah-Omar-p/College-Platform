<?php

namespace App\Providers;

use App\Interfaces\{CommentRepositoryInterface,
    CourseProfRepositoryInterface,
    CourseRepositoryInterface,
    CourseStudentRepositoryInterface,
    GradeRepositoryInterface,
    LikeRepositoryInterface,
    MediaRepositoryInterface,
    NotificationRepositoryInterface,
    PostRepositoryInterface,
    QuestionRepositoryInterface,
    QuizRepositoryInterface,
    StudentDataRepositoryInterface,
    UserRepositoryInterface};
use App\Repositories\{CommentRepository, CourseProfRepository, CourseRepository,
    CourseStudentRepository, GradeRepository, LikeRepository, MediaRepository,
    NotificationRepository, PostRepository, QuizRepository, StudentDataRepository,
    UserRepository ,QuestionRepository,
};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(StudentDataRepositoryInterface::class, StudentDataRepository::class);
        $this->app->bind(QuizRepositoryInterface::class, QuizRepository::class);
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
        $this->app->bind(MediaRepositoryInterface::class, MediaRepository::class);
        $this->app->bind(LikeRepositoryInterface::class, LikeRepository::class);
        $this->app->bind(GradeRepositoryInterface::class, GradeRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);

    }

    public function boot(): void
    {
        //
    }
}
