<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    public function blog()
    {
        return $this->hasMany('App\models\blog', 'cate_id', 'id');
    }
}
