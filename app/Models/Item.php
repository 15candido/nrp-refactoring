<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [

        'name', 
        'slug', 
        'description'
    ];

    public function demands()
    {
        return $this->belongsToMany(Demand::class)->withPivot('quantity', 'note');
    }

    public function donation()
    {
        return $this->belongsToMany(Person::class, 'item_person', 'item_id','person_id')
            ->withPivot('quantity', 'note', 'donate_date');
    }
}
