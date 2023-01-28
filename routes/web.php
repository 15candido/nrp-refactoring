<?php

use App\Models\Demand;
use App\Models\Item;
use App\Models\Person;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // Give me All People and Orderby the Last User Created

    // \Illuminate\Support\Facades\DB::listen(function($query){
    //     logger($query->sql, $query->bindings);
    // });
    // $people = Person::latest()->get();
    return view('welcome', [
        'people' => Person::latest()->with('user')->get()
    ]);
});

Route::get('withuser', function () {
    // Give me the People who Have the User 
    $people = Person::with('user')->whereHas('user')->get();
    return view('welcome', compact('people'));
});

Route::get('projects', function () {
    // Give me All the Projects and the Collaborators that Collaborating in each one of the Project
    return view('projects', [
        'projects' => Project::latest()->with(['collaborator'])->get()
    ]);
});

Route::get('projects/{project:slug}', function (Project $project) {
    // Give me the Project where ID Matches this ID and  his collaborators 
    return view('project', [
        'project' => $project
    ]);
});

Route::get('collaborator/{collaborator:username}', function (Person $collaborator) {
    // Give me the Collaborator where ID matches this ID and Return his Collaborative Projects
    return view('collaborator', [
        'collaborator' => $collaborator
    ]);
});

Route::get('demands', function () {
    // Give me all the demands and their corresponding projects
    $demands = Demand::latest()->with('projects')->get();
    return view('demands', [
        'demands' => $demands
    ]);
});

Route::get('demands/{demand:slug}', function (Demand $demand) {
    // Give me the demand where id matches this id and  his items 
    return view('demand', [
        'demand' => $demand
    ]);
});

Route::get('necessities', function () {
    // Give me All the Projects and the Collaborators that Collaborating in each one of the Project
    return view('items', [
        'items' => Item::latest()->with(['demands'])->get()
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
