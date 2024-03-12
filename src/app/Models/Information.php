<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';

    protected $dates = [
        'release_date'
    ];

    public function adminUsers()
    {
        return $this->belongsTo(AdminUser::class, 'user_id');
    }
}
