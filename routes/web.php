<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('is_admin')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); 
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); 
});



Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

});
