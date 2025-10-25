<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawteamdata extends Model
{
    use HasFactory;
    protected $table = "raw_team_data";
    public $timestamps = false;
     protected $fillable = [
        'project_id',
    ];
}
