<?php

use App\Models\Person;
use App\Models\Project;
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
    // Return All People
    $people = Person::latest()->get();
    // dd($people->count());
    return view('welcome', [
        'people' => $people
    ]);
});

Route::get('withuser', function () {
    // Return People Only With Users 
    $people = Person::whereHas('user')->get();
    // dd($people->count());
    return view('welcome', compact('people'));
});

Route::get('projects', function(){

    // Return All the Projects
    return view('projects', [
        'projects' => Project::all()
    ]);
});

Route::get('projects/{project}', function ($id)
{
    // Give the Project where id matches is id 
    return view('project', [
       'project' => Project::find($id)
    ]);
});

Route::get('users/{person}', function ($id)
{
    // Give the Project where id matches is id 
    return view('projects', [
       'projects' => Person::find($id)
    ]);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
