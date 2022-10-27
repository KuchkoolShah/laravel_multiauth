<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apk extends Model
{
    use HasFactory;

    protected $fillable = ['image' , 'apk_name' , 'apk_url' , 'apk_count'];

    public $timestamps = false;
}
