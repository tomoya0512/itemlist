<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'list_name' => 'required',
        'destination_name' => 'required',
        'item_name' => 'required'
    );
}
