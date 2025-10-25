<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Derivedmetrics extends Model
{
    use HasFactory;
    protected $table = "derivedMetrics";
    public $timestamps = false;
     protected $fillable = [
        'project_id',
    ];
}
