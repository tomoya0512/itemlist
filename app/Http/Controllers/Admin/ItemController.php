<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
class ItemController extends Controller
{
  public function add(){
    $categories = Category::all();

    return view('admin.item.create', ['categories' => $categories]);
  }

  public function create(Request $request){
    // Varidationを行う
    $this->validate($request, Item::$rules);
    $item = new Item;
    $item->name = $request->get("item_name");
    $item->category_id = $request->get("category_id");
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

    return view('admin.item.index', ['posts' => $posts, 'name' => $name]);
  }

  public function edit(Request $request){
      // Item Modelからデータを取得する
      $item = Item::find($request->id);
      if (empty($item)) {
        abort(404);
      }
      $categories = Category::all();

      return view('admin.item.edit', ['item_form' => $item], ['categories' => $categories]);
  }

  public function update(Request $request){
    // Validationをかける
    $this->validate($request, Item::$rules);
    // Item Modelからデータを取得する
    $item = Item::find($request->id);
    $item_form = $request->all();
    unset($item_form['_token']);
    $item->fill($item_form)->save();

    return redirect('admin/item');
  }

  public function delete(Request $request){
      // 該当するCategory Modelを取得
      $item = Item::find($request->id);
      // 削除する
      $item->delete();
      
      return redirect('admin/item/');
  }
}
