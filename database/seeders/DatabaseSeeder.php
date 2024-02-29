<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
use App\Models\StudentQuiz;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $professorRole = Role::create(['name' => 'professor']);
        $studentRole = Role::create(['name' => 'student']);
        $controlMemberRole = Role::create(['name'=>'control-member']);

        $permission = Permission::create(['name'=>'create']);

        $superAdminRole->syncPermissions([]);
        $professorRole->syncPermissions([]);
        $studentRole->syncPermissions([]);
        $controlMemberRole->syncPermissions([]);

        $user = \App\Models\User::updateOrCreate([
            'email' => 'user@test.com',
        ],[
            'name' => 'Test User',
            'phone' => '4924802402',
            'national_id' =>'84340294204229482',
            'password'=>bcrypt(123456)
        ]);










        $users = \App\Models\User::factory(400)->create();
        $courses = Course::factory(60)->create();
        $quizzes = Quiz::factory(50)->create();
        $questions = Question::factory(99)->create();
        $posts = Post::factory(30)->create();
        $comments = Comment::factory(50)->create();
        $media = Media::factory(60)->create();
        $likes = Like::factory(99)->create();
        $grades = Grade::factory(99)->create();
        $studentQuiz = StudentQuiz::factory(90)->create();
        $courseProf = CourseProf::factory(20)->create();
        $courseStudent = CourseStudent::factory(99)->create();
        $studentData = StudentData::factory(99)->create();
        $notifications = Notification::factory(99)->create();

    }
}
