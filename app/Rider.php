<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $fillable =
        [
            'rider_name','rider_phone_number','rider_password','rider_status','added_on'
        ];
    Protected $primaryKey = 'rider_id';
}
