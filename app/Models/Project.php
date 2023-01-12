<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'excerpt',
        'description',
    ];

    public function collaborator()
    {
        return $this->belongsToMany(Person::class, 'person_project', 
            'person_id', 'project_id');
    }

    public function demands()
    {
        return $this->belongsToMany(Demand::class)->withPivot('quantity', 'note');
    }

}
