<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\BreakController;
use App\Http\Controllers\StampController;
use App\Http\Controllers\DateController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAttendanceController;


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


Route::middleware('auth')->group(function(){
    // スタンプ
    Route::get('/stamp',[StampController::class,'index'])->name('stamp');

    Route::prefix('stamp')->group(function () {
        Route::post('/work/start',[WorkController::class,'start'])->name('work.start');
        Route::post('/work/end',[WorkController::class,'end'])->name('work.end');
        Route::post('/break/start/{workId}',[BreakController::class,'start'])->name('break.start');
        Route::post('/break/end/{workId}', [BreakController::class,'end'])->name('break.end');
    });

    // 日付
    Route::get('/date/{date?}',[DateController::class,'index'])->name('date');

    // 認証
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

    // ユーザー管理
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/{user}',[UserAttendanceController::class,'show'])->name('users.attendance.show');
    Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('users.destroy');
});

// 登録・ログイン
Route::post('/register',[RegisterController::class,'store'])->name('register');

Route::post('/login',[AuthController::class,'login'])->name('login');


// メール認証
Route::get('/email/verify', function() {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/stamp');
})->middleware(['auth','signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', '認証リンクを送信しました。');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');