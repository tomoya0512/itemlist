<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = array('id');


    public static $rules = array(
      'item_name' => 'required',
      'category_name' => 'required'
    );
}
