<?php

use App\Http\Controllers\Admin\AdminInstanceController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminParticipantController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminQuestionController;
use App\Http\Controllers\Admin\AdminTestController;
// use App\Http\Controllers\Instance\InstancePackageController;
// use App\Http\Controllers\Instance\InstanceQuestionController;
// use App\Http\Controllers\Instance\InstanceParticipantController;
// use App\Http\Controllers\Instance\InstanceProfileController;
// use App\Http\Controllers\Instance\InstanceReportController;
// use App\Http\Controllers\Instance\InstanceParticipatorController;
// use App\Http\Controllers\Instance\InstanceMembersController;
// use App\Http\Controllers\Instance\InstanceTestController;
// use App\Http\Controllers\Participant\AnswerExamController;
// use App\Http\Controllers\Participant\ParticipantDetailPackageController;
// use App\Http\Controllers\Participant\ParticipantExamController;
// use App\Http\Controllers\Participant\ParticipantProfileController;
// use App\Http\Controllers\Participant\ParticipantPackageController;
// use App\Http\Controllers\Participant\ParticipantResultController;
// use App\Models\Participant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','user-access:super'])->group(function () {
    Route::resource('admin/participant', AdminParticipantController::class)->names('admin.participant');
    Route::resource('admin/instance', AdminInstanceController::class)->names('admin.instance');
    Route::resource('admin/package', AdminPackageController::class)->names('admin.package');
    Route::resource('admin/question', AdminQuestionController::class)->names('admin.question');

    Route::resource('admin/test', AdminTestController::class)->names('admin.test');
    Route::post('admin/test', [AdminTestController::class,'inserttest'])->name('admin.test');

    Route::get('admin/instance/package', [AdminInstanceController::class,'package'])->name('admin.instance.package');
    Route::get('admin/question/upload', [AdminQuestionController::class,'upload'])->name('admin.question.upload');
    Route::get('admin/participant/format', [AdminParticipantController::class,'format'])->name('admin.participant.format');
    Route::post('admin/participant/import', [AdminParticipantController::class,'import'])->name('admin.participant.import');

    Route::get('/admin/profile', [AdminProfileController::class,'index'])->name('admin.profile');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});

// Route::middleware(['auth','user-access:participant'])->group(function(){

//     Route::resource('/profile', ParticipantProfileController::class);
//     Route::resource('/package', ParticipantPackageController::class);
//     Route::resource('/exam', ParticipantExamController::class);
//     Route::resource('/result', ParticipantResultController::class);
//     Route::get('/exams/{id}', [ParticipantExamController::class,'createTask'])->name('exam.createTask');
//     Route::post('/send-answer/{id}/{idP}',[AnswerExamController::class, 'store']);
//     Route::post('/send-result',[AnswerExamController::class, 'Result'])->name('send.result');

// });
// // Route::post('instance/member',[InstanceMemberController::class,'insertMembers'])->name('instance.member.insert');
// Route::middleware(['auth','user-access:instance'])->group(function(){
//     Route::resource('instance/package', InstancePackageController::class)->names('instance.package');
//     Route::resource('instance/member', InstanceMembersController::class)->names('instance.member');
//     Route::put('/instance/member', [InstanceMembersController::class, 'hapus'])->name('instance.member.hapus');

//     Route::resource('instance/question', InstanceQuestionController::class)->names('instance.question');
//     Route::resource('instance/test', InstanceTestController::class)->names('instance.test');
//     // Route::post('instance/test/index','InstanceTestController@inserttest');
//     Route::post('instance/test', [InstanceTestController::class,'inserttest'])->name('instance.test');
//     Route::resource('instance/participant', InstanceParticipantController::class)->names('instance.participant');

//     Route::get('instance/participant/format', [InstanceParticipantController::class,'format'])->name('instance.participant.format');
//     Route::post('instance/participant/import', [InstanceParticipantController::class,'import'])->name('instance.participant.import');


//     Route::get('/report/participator', [InstanceParticipatorController::class,'index'])->name('participator.index');
//     Route::get('/report', [InstanceReportController::class,'index'])->name('report.index');

//     Route::get('instance/question/upload', [InstanceQuestionController::class,'upload'])->name('instance.question.upload');

//     Route::get('/instance/profile', [InstanceProfileController::class,'index'])->name('instance.profile');
//     Route::put('/instance/profile', [InstanceProfileController::class, 'update'])->name('instance.profile.update');
// });
