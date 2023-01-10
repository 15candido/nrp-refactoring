<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'excerpt',
        'description',
    ];

    public function people()
    {
        return $this->belongsToMany(Person::class, 'person_project', 'person_id', 'project_id');
    }


}
