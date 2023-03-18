<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveLink extends Model
{

    use HasFactory;
    protected $fillable=['live_id','name','link'];
}
