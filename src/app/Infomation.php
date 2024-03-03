<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infomation extends Model
{
    protected $table = 'infomation';

    protected $dates = [
        'release_date'
    ];
}
