<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoConferenceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::middleware(['checkauth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/select', [ChatController::class, 'selectUser'])->name('chat.select');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
});

Route::middleware('checkauth')->group(function () {
    Route::post('/courses/{courseId}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses', [CourseController::class, 'createCourse'])->name('courses.create');
    Route::get('/dashboard-teachers', [CourseController::class, 'dashboardTeachers'])
    ->name('dashboard')
    ->middleware('role:teacher');

Route::get('/dashboard-students', [CourseController::class, 'dashboardStudents'])
    ->name('dashboard.student')
    ->middleware('role:student');
    Route::get('/coursesFind', [CourseController::class, 'findCourse'])->name('courses.find');
    
});
Route::get('/payment-history', [PaymentController::class, 'paymentHistory'])->name('payment.history');Route::get('/', function () {
    // return view('welcome');
    return view('index');
});


Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/navbar', function () {
    // return view('welcome');
    return view('navbar');
});
Route::get('/auth-logout', function () {
    Auth::logout();
    return redirect()->route('courses.index');
})->name('auth-logout');
Route::get('/video-conferencing', function () {
    return view('video-conferencing');
})->name('video-conferencing');

// Route::get('/payment-history', function () {
//     // return view('welcome');
//     return view('payment-history');
// });
// Route::get('/dashboard-teachers', function () {
//     // return view('welcome');
//     return view('dashboard-teachers');
// });
Route::get('/course-details', function () {
    // return view('welcome');
    return view('course-details');
});



// Route::get('/chat/send', [ChatController::class, 'sendMessage']);
// Route::get('/chat/receive/{id}', [ChatController::class, 'receiveMessage']);

// Route::post('/courses', [CourseController::class, 'createCourse']);
// Route::put('/courses/{id}', [CourseController::class, 'updateCourse']);
// Route::delete('/courses/{id}', [CourseController::class, 'deleteCourse']);
// Route::get('/courses/search', [CourseController::class, 'searchCourse']);

// Route::post('/enrollments', [EnrollmentController::class, 'enrollCourse']);
// Route::delete('/enrollments/{id}', [EnrollmentController::class, 'cancelEnrollment']);

// Route::post('/payments', [PaymentController::class, 'processPayment']);
// Route::put('/payments/{id}/refund', [PaymentController::class, 'refundPayment']);

// Route::post('/login', [UserController::class, 'login']);
// Route::post('/register', [UserController::class, 'register']);
// Route::put('/users/{id}', [UserController::class, 'updateProfile']);

// Route::post('/conferences', [VideoConferenceController::class, 'startConference']);
// Route::put('/conferences/{id}/end', [VideoConferenceController::class, 'endConference']);

Route::get('register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegistrationController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
