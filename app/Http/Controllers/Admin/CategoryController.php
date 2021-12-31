<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
  public function add(){
    return view('admin.categories.create');
  }

  public function create(Request $request){
    return redirect('admin.categories.create');
  }
}
