<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'demand_start_date',
        'demand_end_date',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'demand_project',
            'demand_id', 'project_id');
    }
}
