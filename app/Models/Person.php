<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'username', 'email', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 
            'person_project', 'person_id', 'project_id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity', 'note', 'donate_date');
    }
}
