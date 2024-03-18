<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';

    protected $fillable = [
        'title',
        'content',
        'release_date',
    ];

    protected $dates = [
        'release_date'
    ];

    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class, 'user_id');
    }
}
