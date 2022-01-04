<?php

namespace App\Http\Controllers\Admin;
use App\Item;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
  public function add(){
    return view('admin.item.create');
  }

  public function create(Request $request){

    // Varidationを行う
    $this->validate($request, Item::$rules);
    $category_list =  Category::select('name') -> orderBy('created_at', 'desc')->get(); 

    $item = new Item;
    $form = $request->all();

    unset($form['_token']);

    $item->fill($form);
    $item->save();

    return redirect('admin/item/create');
  }

  public function index(Request $request){
    $name = $request->name;
    if ($name != '') {
      // 検索されたら検索結果を取得する
      $posts = Item::where('name', $name)->get();
    } else{
      // それ以外はすべてのアイテムを取得する
      $posts = Item::all();
    }
    return view('admin.Item.index', ['posts' => $posts, 'name' => $name]);
  }

  public function edit(Request $request)
  {
      // Item Modelからデータを取得する
      $item = Item::find($request->id);
      if (empty($item)) {
        abort(404);
      }
      return view('admin.item.edit', ['item_form' => $item]);
  }

  public function update(Request $request){
    // Validationをかける
    $this->validate($request, Item::$rules);
    // News Modelからデータを取得する
    $item = Item::find($request->id);
    // 送信されてきたフォームデータを格納する
    $item_form = $request->all();

    unset($item_form['_token']);

    // 該当するデータを上書きして保存する
    $item->fill($item_form)->save();

    return redirect('admin/item');
  }
}
