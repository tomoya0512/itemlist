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

    // Varidationを行う
    $this->validate($request, Category::$rules);

    $category = new Category;
    $form = $request->all();

    unset($form['_token']);

    $category->fill($form);
    $category->save();

    return redirect('admin/category/create');
  }
}
