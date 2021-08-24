<?php

use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Dashboard\AddServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, "index"])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
    Route::get('/signup/{type}', [SignUpController::class, 'signup'])->name('signup_form');
    Route::post('/signup/{type}', [SignUpController::class, 'signup_action']);


    Route::get('/signin',[SignInController::class,'index'])->name('signin');
    Route::get('/login', function(){
        return redirect()->route('signin');
    })->name('login');
    Route::post('/signin',[SignInController::class,'signin']);
});

Route::prefix('/email')->group(function(){
    Route::get('/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');


    Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::get('/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::get('/celebrities', function () { 
    return view('pages.celebrities');
});
Route::get('/message', function () {
    return view('pages.message');
});
Route::get('/messages', function () {
    return view('pages.messages');
});

Route::get('/profile/{username}', [ProfileController::class, 'index'])
    ->whereAlphaNumeric('username')
    ->middleware('profile.exists');

Route::get('/profile-services', function () {
    return view('pages.profile-services');
});

Route::get('/profile-agent', function () {
    return view('pages.profile-agent');
});

Route::get('/profile-ads', function () {
    return view('pages.profile-ads');
});


Route::get('/service', function () {
    return view('pages.service');
});


Route::prefix('/dashboard')->middleware('verified')->group(function () {
    Route::get('/', function () {
        return view('dashboard.main');
    });
    Route::get('/tasks', function () {
        return view('dashboard.tasks');
    });
    Route::get('/celebrities', function () {
        return view('dashboard.celebrities');
    });
    Route::get('/credit', function () {
        return view('dashboard.credit');
    });
    Route::get('/edit-profile', function () {
        return view('dashboard.edit-profile');
    });

    Route::get('/ads', function () {
        return view('dashboard.ads');
    });

    
    Route::prefix('/services')->as('services')->middleware('services.add')->group(function () {
        Route::get('/', function () {
            return view('dashboard.services');
        });

        Route::get('/add', [AddServiceController::class, 'index'])->name('add');
        Route::post('/add', [AddServiceController::class, 'store']);
    });

    Route::get('/notifications', function () {
        return view('dashboard.notifications');
    });

    Route::get('/send-notification', function () {
        return view('dashboard.send-notification');
    });
});
