<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'autor_id',
        'rubric_id'
    ];

    public function authors() {

        return $this->belongsToMany(Author::class);

    }

    public function rubrics() {

        return $this->belongsToMany(Rubric::class);

    }
}
