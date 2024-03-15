<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';

    protected $fillabele = [
        'title',
        'content',
        'release_date',
        '_token',
    ];

    protected $dates = [
        'release_date'
    ];

    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class, 'user_id');
    }
}
