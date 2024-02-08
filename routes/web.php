<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::middleware(['auth:sanctum', 'verified'])
->get('/', function () {
    return view('reports.reports');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        return view('reports.reports');
    })
    ->name('dashboard');

Route::prefix('/')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {});

Route::middleware(['auth:sanctum', 'verified'])
->get('/users', function () {
    return view('users.users');
});
    

Route::middleware(['auth:sanctum', 'verified'])
->get('/users/assigment', function(){
    return view('users.assignmentusers');
});

Route::middleware(['auth:sanctum', 'verified'])
->get('/areasprocess', function(){
    return view('areasprocess.areasprocess');
});

Route::middleware(['auth:sanctum', 'verified'])
->get('/trainings', function(){
    return view('trainings.trainings');
});

Route::middleware(['auth:sanctum', 'verified'])
->get('/trainingschecklist', function(){
    return view('trainings.trainingschecklist');
});

Route::middleware(['auth:sanctum', 'verified'])
->get('/reports/skillsmatrix', function(){
    return view('reports.reports');
});

Route::middleware(['auth:sanctum', 'verified'])
->get('/assignment', function(){
    return view('assignment.assignment');
});


Route::get('/emailprueba', function(){
    return view('emails.assigmentpetition');
});