<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = array('id');


    public static $rules = array(
      'name' => 'required',
      'category_id' => 'required'
    );

    public function categories()
    {
        return $this->hasMany('App\Category', 'foreign_key');

    }
}
