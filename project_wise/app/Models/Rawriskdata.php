<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawriskdata extends Model
{
    use HasFactory;
    protected $table = "raw_risk_data";
    public $timestamps = false;
}
