<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseProf;
use App\Models\CourseStudent;
use App\Models\Grade;
use App\Models\Like;
use App\Models\Media;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\StudentData;
use App\Models\User;
use App\Policies\CommentControllerPolicy;
use App\Policies\CourseControllerPolicy;
use App\Policies\CourseProfControllerPolicy;
use App\Policies\GradeControllerPolicy;
use App\Policies\LikeControllerPolicy;
use App\Policies\MediaControllerPolicy;
use App\Policies\NotificationControllerPolicy;
use App\Policies\PostPolicy;
use App\Policies\QuestionControllerPolicy;
use App\Policies\QuizControllerPolicy;
use App\Policies\StudentCourseControllerPolicy;
use App\Policies\StudentDataControllerPolicy;
use App\Policies\UserControllerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        Comment::class => CommentControllerPolicy::class,
        Course::class => CourseControllerPolicy::class,
        CourseProf::class => CourseProfControllerPolicy::class,
        Grade::class => GradeControllerPolicy::class,
        Like::class => LikeControllerPolicy::class,
        Media::class => MediaControllerPolicy::class,
        Notification::class => NotificationControllerPolicy::class,
        Question::class => QuestionControllerPolicy::class,
        Quiz::class => QuizControllerPolicy::class,
        CourseStudent::class => StudentCourseControllerPolicy::class,
        StudentData::class => StudentDataControllerPolicy::class,
        User::class => UserControllerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
