<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighLink extends Model
{

    use HasFactory;
    protected $fillable=['high_lights_id','name','link'];
}
