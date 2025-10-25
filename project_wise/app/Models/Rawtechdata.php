<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawtechdata extends Model
{
    use HasFactory;
    protected $table = "raw_tech_data";
    public $timestamps = false;
    protected $fillable = [
        'project_id',
    ];
}
