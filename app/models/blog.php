<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blog';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\models\category', 'cate_id', 'id');
    }
}
