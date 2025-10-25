<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outputs extends Model
{
    use HasFactory;
    protected $table = "outputs";
    public $timestamps = false;
     protected $fillable = [
        'project_id',
    ];
}
