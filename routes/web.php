<?php

use App\Http\Controllers\Core\CoreController;
use App\Http\Controllers\Core\SmaController;
use App\Http\Controllers\Core\SmpCoreController;
use App\Http\Controllers\Logic\AuthController;
use App\Http\Controllers\Logic\QuizController;
use Illuminate\Support\Facades\Route;

### 🔹 ROUTE LOGIN & LOGOUT ###
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

### 🔹 DASHBOARD SD ###
Route::prefix('sd')->group(function () {
    Route::get('/', function () {
        return view('pages.sd.home');
    })->name('dashboard.sd');

    Route::get('/tujuan', [CoreController::class, 'goal'])->name('goal.sd');

    Route::prefix('materi')->group(function () {
        Route::get('/', [CoreController::class, 'subject'])->name('subject.sd');
        Route::get('/detail-materi/{id}', [CoreController::class, 'subjectDetail'])->name('subject-detail.sd');
        Route::get('/detail-sub-materi/{id}', [CoreController::class, 'SubSubjectDetail'])->name('sub-subject-detail.sd');
    });

    Route::get('/galeri', [CoreController::class, 'gallery'])->name('gallery.sd');

    // Route::get('/profile', function () {
    //     return view('pages.sd.profile');
    // })->name('profile.sd');
    Route::middleware('auth.session')->group(function () {
        Route::prefix('quiz')->group(function () {
            Route::get('/', [CoreController::class, 'quiz'])->name('quiz.sd');
            Route::get('/detail-quiz/{id}', [CoreController::class, 'questions'])->name('question.sd');
        });
        Route::post('/update-profile', [CoreController::class, 'updateProfile'])->name('update-profile');
        Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
    });
});

### 🔹 DASHBOARD SMP ###
Route::prefix('smp')->group(function () {
    Route::get('/', function () {
        return view('pages.smp.home');
    })->name('dashboard.smp');

    Route::get('/tujuan', [SmpCoreController::class, 'goal'])->name('goal.smp');

    Route::prefix('materi')->group(function () {
        Route::get('/', [SmpCoreController::class, 'subject'])->name('subject.smp');
        Route::get('/detail-materi/{id}', [SmpCoreController::class, 'subjectDetail'])->name('subject-detail.smp');
        Route::get('/detail-sub-materi/{id}', [SmpCoreController::class, 'SubSubjectDetail'])->name('sub-subject-detail.smp');
    });

    Route::get('/galeri', [SmpCoreController::class, 'gallery'])->name('gallery.smp');

    // Route::get('/profile', function () {
    //     return view('pages.smp.profile');
    // })->name('profile.smp');
    Route::middleware('auth.smp.session')->group(function () {
        Route::prefix('quiz')->group(function () {
            Route::get('/', [SmpCoreController::class, 'quiz'])->name('quiz.smp');
            Route::get('/detail-quiz/{id}', [SmpCoreController::class, 'questions'])->name('question.smp');
        });
        Route::post('/update-profile', [SmpCoreController::class, 'updateProfile'])->name('update-profile.smp');
        Route::post('/quiz/{quiz}/submit', [QuizController::class, 'smpSubmitQuiz'])->name('quiz.submit.smp');
    });
});

Route::prefix('sma')->group(function () {
    Route::get('/', [SmaController::class, 'goal'])->name('goal.sma');
    Route::prefix('materi')->group(function () {
        Route::get('/', [SmaController::class, 'subject'])->name('subject.sma');
        Route::get('/detail-sub-materi/{id}', [SmaController::class, 'subjectDetail'])->name('sub-subject-detail.sma');
    });
    Route::get('galeri', [SmaController::class, 'gallery'])->name('gallery.sma');
    Route::middleware('auth.sma.session')->prefix('quiz')->group(function () {
        Route::get('/', [SmaController::class, 'quiz'])->name('quiz.sma');
        Route::get('/detail-quiz/{id}', [SmaController::class, 'questions'])->name('question.sma');
        Route::post('/quiz/{quiz}/submit', [QuizController::class, 'smaSubmitQuiz'])->name('quiz.submit.sma');
    });
});
