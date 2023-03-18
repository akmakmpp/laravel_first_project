<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdView extends Model
{
    use HasFactory;
    protected $fillable =[
    'directlink','appopenmessenger','appopenlink','appopenbanner',
    'bannermessenger','bannerlink','bannerimg','inter','img','messenger','link',
    'hlbannerimg','hlbannerlink','hlbannermessenger','hlinter','hlimg','hlmessenger',
    'hllink','videoad','testad','test_no','imglink','message','messagelink'];
}
