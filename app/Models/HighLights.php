<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighLights extends Model
{
    use HasFactory;

    protected $fillable=['league_name','home_name','home_logo','away_name','away_logo','date','time'];
    public function links(){
        return $this->hasMany(HighLink::class);
    }
}
