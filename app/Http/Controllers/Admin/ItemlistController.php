<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemlistController extends Controller
{
    public function add(){
      return view('admin.item.create');
    }

    public function create(Request $request){
      return redirect('admin/item/create');
    }
}
