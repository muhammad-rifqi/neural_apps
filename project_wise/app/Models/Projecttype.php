<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecttype extends Model
{
    use HasFactory;
    protected $table = "project_categories";
    const UPDATED_AT = 'last_updated_at';
    const CREATED_AT = 'created_at';
}
