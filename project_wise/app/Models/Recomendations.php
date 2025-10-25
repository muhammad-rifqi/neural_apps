<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendations extends Model
{
   use HasFactory;
    protected $table = "recommendations";
    public $timestamps = false;
     protected $fillable = [
        'project_id',
    ];
}

