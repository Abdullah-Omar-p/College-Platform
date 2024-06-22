<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseProfController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentDataController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('auth')->namespace('App\Http\Controllers\AuthControllers')->group(function () {
    Route::post('logout', 'LogoutController@logout');
    Route::post('login', 'LoginController@loginUser')->name('login');
    Route::post('password/email', 'PasswordResetLinkController@store');
    Route::post('password/reset', 'NewPasswordController@store');
});

Route::prefix('posts')->middleware('auth:sanctum')->group(function (){
    Route::get('',[PostController::class,'list']);
    Route::get('find/{id}',[PostController::class,'findById']);
    Route::post('create',[PostController::class,'create']);
    Route::post('update/{id}',[PostController::class,'update']);
    Route::get('delete/{id}',[PostController::class,'delete']);
});

Route::prefix('comments')->middleware('auth:sanctum')->group(function (){
    Route::get('',[CommentController::class,'list']);
    Route::get('find/{id}',[CommentController::class,'findById']);
    Route::post('create',[CommentController::class,'create']);
    Route::post('update/{id}',[CommentController::class,'update']);
    Route::get('delete/{id}',[CommentController::class,'delete']);
});

Route::prefix('courses')->middleware('auth:sanctum')->group(function (){
    Route::get('',[CourseController::class,'list']);
    Route::get('find/{id}',[CourseController::class,'findById']);
    Route::post('create',[CourseController::class,'create']);
    Route::post('update/{id}',[CourseController::class,'update']);
    Route::get('delete/{id}',[CourseController::class,'delete']);
});

Route::prefix('grades')->middleware('auth:sanctum')->group(function (){
    Route::get('',[GradeController::class,'list']);
    Route::get('/grades',[GradeController::class, 'studentGrades']);
    Route::get('find/{id}',[GradeController::class,'findById']);
    Route::post('create',[GradeController::class,'create']);
    Route::post('update/{id}',[GradeController::class,'update']);
    Route::get('delete/{id}',[GradeController::class,'delete']);
});

Route::prefix('likes')->middleware('auth:sanctum')->group(function (){
    Route::get('',[LikeController::class,'list']);
    Route::get('find/{id}',[LikeController::class,'findById']);
    Route::post('create',[LikeController::class,'create']);
    Route::post('update/{id}',[LikeController::class,'update']);
    Route::get('delete/{id}',[LikeController::class,'delete']);
});

Route::prefix('media')->middleware('auth:sanctum')->group(function (){
    Route::get('',[MediaController::class,'list']);
    Route::get('find/{id}',[MediaController::class,'findById']);
    Route::post('create',[MediaController::class,'create']);
    Route::post('update/{id}',[MediaController::class,'update']);
    Route::get('delete/{id}',[MediaController::class,'delete']);
});

Route::prefix('notification')->middleware('auth:sanctum')->group(function (){
    Route::get('',[NotificationController::class,'list']);
    Route::get('find/{id}',[NotificationController::class,'findById']);
    Route::post('create',[NotificationController::class,'create']);
    Route::post('update/{id}',[NotificationController::class,'update']);
    Route::get('delete/{id}',[NotificationController::class,'delete']);
});

Route::prefix('questions')->middleware('auth:sanctum')->group(function (){
    Route::get('',[QuestionController::class,'list']);
    Route::get('find/{id}',[QuestionController::class,'findById']);
    Route::post('create',[QuestionController::class,'create']);
    Route::post('update/{id}',[QuestionController::class,'update']);
    Route::get('delete/{id}',[QuestionController::class,'delete']);
});

Route::prefix('quizzes')->middleware('auth:sanctum')->group(function (){
    Route::get('',[QuizController::class,'list']);
    Route::get('find/{id}',[QuizController::class,'findById']);
    Route::post('create',[QuizController::class,'create']);
    Route::post('update/{id}',[QuizController::class,'update']);
    Route::get('delete/{id}',[QuizController::class,'delete']);
});

Route::prefix('student-data')->middleware('auth:sanctum')->group(function (){
    Route::get('',[StudentDataController::class,'list']);
    Route::get('find/{id}',[StudentDataController::class,'findById']);
    Route::post('create',[StudentDataController::class,'create']);
    Route::post('update/{id}',[StudentDataController::class,'update']);
    Route::get('delete/{id}',[StudentDataController::class,'delete']);
});

Route::prefix('users')->middleware('auth:sanctum')->group(function (){
    Route::get('',[UserController::class,'list']);
    Route::get('find/{id}',[UserController::class,'findById']);
    Route::post('create',[UserController::class,'create']);
    Route::post('update/{id}',[UserController::class,'update']);
    Route::get('delete/{id}',[UserController::class,'delete']);
});
