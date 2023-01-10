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
    // Give me All People and Orderby the Last User Created
    $people = Person::latest()->get();
    return view('welcome', [
        'people' => $people
    ]);
});

Route::get('withuser', function () {
    // Give me the People who Have the User 
    $people = Person::whereHas('user')->get();
    return view('welcome', compact('people'));
});

Route::get('projects', function(){
    // Give me All the Projects
    return view('projects', [
        'projects' => Project::all()
    ]);
});

Route::get('projects/{project:slug}', function (Project $project){
    // Give me the Project where ID Matches This ID 
    return view('project', [
       'project' => $project
    ]);
});

Route::get('collaborator/{collaborator:slug}', function (Person $collaborator){
    // Give me the Collaborator where ID matches this ID and Return his Collaborative Projects
    return view('collaborator', [
       'collaborator' => $collaborator
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
