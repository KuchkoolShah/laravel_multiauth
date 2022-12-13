<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\Country;
class City extends Model
{
    use HasFactory;


    public function country() {
        return $this->belongsTo('App\Models\Country');
    }

    public function state() {
        return $this->belongsTo('App\Models\State');
    }
}
