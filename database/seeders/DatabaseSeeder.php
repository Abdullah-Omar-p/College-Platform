<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\{Comment,Course,CourseProf,CourseStudent,Grade,Like,Media,
    Notification,Post,Question,Quiz,StudentData,StudentQuiz};
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

        // Define and assign permissions for Comment model
        $listCommentPermission = Permission::create(['name' => 'Comment.list']);
        $createCommentPermission = Permission::create(['name' => 'Comment.create']);
        $updateCommentPermission = Permission::create(['name' => 'Comment.update']);
        $findCommentPermission = Permission::create(['name' => 'Comment.find']);
        $deleteCommentPermission = Permission::create(['name' => 'Comment.delete']);

// Define and assign permissions for Course model
        $listCoursePermission = Permission::create(['name' => 'Course.list']);
        $createCoursePermission = Permission::create(['name' => 'Course.create']);
        $updateCoursePermission = Permission::create(['name' => 'Course.update']);
        $findCoursePermission = Permission::create(['name' => 'Course.find']);
        $deleteCoursePermission = Permission::create(['name' => 'Course.delete']);

// Define and assign permissions for CourseProf model
        $listCourseProfPermission = Permission::create(['name' => 'CourseProf.list']);
        $createCourseProfPermission = Permission::create(['name' => 'CourseProf.create']);
        $updateCourseProfPermission = Permission::create(['name' => 'CourseProf.update']);
        $findCourseProfPermission = Permission::create(['name' => 'CourseProf.find']);
        $deleteCourseProfPermission = Permission::create(['name' => 'CourseProf.delete']);

// Define and assign permissions for CourseStudent model
        $listCourseStudentPermission = Permission::create(['name' => 'CourseStudent.list']);
        $createCourseStudentPermission = Permission::create(['name' => 'CourseStudent.create']);
        $updateCourseStudentPermission = Permission::create(['name' => 'CourseStudent.update']);
        $findCourseStudentPermission = Permission::create(['name' => 'CourseStudent.find']);
        $deleteCourseStudentPermission = Permission::create(['name' => 'CourseStudent.delete']);

// Define and assign permissions for Grade model
        $listGradePermission = Permission::create(['name' => 'Grade.list']);
        $createGradePermission = Permission::create(['name' => 'Grade.create']);
        $updateGradePermission = Permission::create(['name' => 'Grade.update']);
        $findGradePermission = Permission::create(['name' => 'Grade.find']);
        $deleteGradePermission = Permission::create(['name' => 'Grade.delete']);

// Define and assign permissions for Like model
        $listLikePermission = Permission::create(['name' => 'Like.list']);
        $createLikePermission = Permission::create(['name' => 'Like.create']);
        $updateLikePermission = Permission::create(['name' => 'Like.update']);
        $findLikePermission = Permission::create(['name' => 'Like.find']);
        $deleteLikePermission = Permission::create(['name' => 'Like.delete']);

// Define and assign permissions for Media model
        $listMediaPermission = Permission::create(['name' => 'Media.list']);
        $createMediaPermission = Permission::create(['name' => 'Media.create']);
        $updateMediaPermission = Permission::create(['name' => 'Media.update']);
        $findMediaPermission = Permission::create(['name' => 'Media.find']);
        $deleteMediaPermission = Permission::create(['name' => 'Media.delete']);

// Define and assign permissions for Notification model
        $listNotificationPermission = Permission::create(['name' => 'Notification.list']);
        $createNotificationPermission = Permission::create(['name' => 'Notification.create']);
        $updateNotificationPermission = Permission::create(['name' => 'Notification.update']);
        $findNotificationPermission = Permission::create(['name' => 'Notification.find']);
        $deleteNotificationPermission = Permission::create(['name' => 'Notification.delete']);

// Define and assign permissions for Post model
        $listPostPermission = Permission::create(['name' => 'Post.list']);
        $createPostPermission = Permission::create(['name' => 'Post.create']);
        $updatePostPermission = Permission::create(['name' => 'Post.update']);
        $findPostPermission = Permission::create(['name' => 'Post.find']);
        $deletePostPermission = Permission::create(['name' => 'Post.delete']);

// Define and assign permissions for Question model
        $listQuestionPermission = Permission::create(['name' => 'Question.list']);
        $createQuestionPermission = Permission::create(['name' => 'Question.create']);
        $updateQuestionPermission = Permission::create(['name' => 'Question.update']);
        $findQuestionPermission = Permission::create(['name' => 'Question.find']);
        $deleteQuestionPermission = Permission::create(['name' => 'Question.delete']);

// Define and assign permissions for Quiz model
        $listQuizPermission = Permission::create(['name' => 'Quiz.list']);
        $createQuizPermission = Permission::create(['name' => 'Quiz.create']);
        $updateQuizPermission = Permission::create(['name' => 'Quiz.update']);
        $findQuizPermission = Permission::create(['name' => 'Quiz.find']);
        $deleteQuizPermission = Permission::create(['name' => 'Quiz.delete']);

// Define and assign permissions for StudentData model
        $listStudentDataPermission = Permission::create(['name' => 'StudentData.list']);
        $createStudentDataPermission = Permission::create(['name' => 'StudentData.create']);
        $updateStudentDataPermission = Permission::create(['name' => 'StudentData.update']);
        $findStudentDataPermission = Permission::create(['name' => 'StudentData.find']);
        $deleteStudentDataPermission = Permission::create(['name' => 'StudentData.delete']);

// Define and assign permissions for StudentQuiz model
        $listStudentQuizPermission = Permission::create(['name' => 'StudentQuiz.list']);
        $createStudentQuizPermission = Permission::create(['name' => 'StudentQuiz.create']);
        $updateStudentQuizPermission = Permission::create(['name' => 'StudentQuiz.update']);
        $findStudentQuizPermission = Permission::create(['name' => 'StudentQuiz.find']);
        $deleteStudentQuizPermission = Permission::create(['name' => 'StudentQuiz.delete']);


        $superAdminRole->syncPermissions(Permission::all());
        $professorRole->syncPermissions([]);
        $studentRole->syncPermissions([]);
        $controlMemberRole->syncPermissions([]);

        $student__ = \App\Models\User::updateOrCreate([
            'email' => 'student@test.com',
        ],[
            'name' => 'Test User',
            'phone' => '4924802402',
            'national_id' =>'84340294204229482',
            'password'=>bcrypt(123456)
        ]);
        $student__->assignRole('student');

        $superAdmin__ = \App\Models\User::updateOrCreate([
            'email' => 'superadmin@test.com',
        ],[
            'name' => 'Test SuperAdmin',
            'phone' => '4924802434',
            'national_id' =>'84340297594229482',
            'password'=>bcrypt(123456)
        ]);
        $superAdmin__->assignRole('super-admin');

        $professor__ = \App\Models\User::updateOrCreate([
            'email' => 'professor@test.com',
        ],[
            'name' => 'Test professor',
            'phone' => '4923402402',
            'national_id' =>'84340294908229482',
            'password'=>bcrypt(123456)
        ]);
        $professor__->assignRole('professor');

        $controlMember__ = \App\Models\User::updateOrCreate([
            'email' => 'control_member@test.com',
        ],[
            'name' => 'Test control member',
            'phone' => '4923402402',
            'national_id' =>'84340739508229482',
            'password'=>bcrypt(123456)
        ]);
        $controlMember__->assignRole('control-member');

        $users = \App\Models\User::factory(400)->create();
        $courses = Course::factory(60)->create();
        $quizzes = Quiz::factory(50)->create();
        $questions = Question::factory(99)->create();
        $posts = Post::factory(100)->create();
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
