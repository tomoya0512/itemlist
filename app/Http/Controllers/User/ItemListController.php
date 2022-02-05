<?php

namespace App\Http\Controllers\User;
use App\ItemList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemListController extends Controller
{
    public function home(){
        return view('user.home');
    }
    
    public function add(){
        return view('user.itemlist.create');
    }

    public function create(Request $request){
        $this->validate($request, ItemList::$rules);
        $list = new ItemList;
        $list->list_name = $request->get("list_name");
        $list->execution_date = $request->get("execution_date");
        $list->destination_name = $request->get("destination_name");
        $list->item_name = $request->get("item_name");
        $list->memo = $request->get("memo");
        $list->save();
    
        return redirect('list');
    }

    public function index(Request $request){
        $list_name = $request->list_name;
    if ($list_name != '') {
      // 検索されたら検索結果を取得する
      $posts = Item::where('list_name', $list_name)->get();
    } else{
      // それ以外はすべてのアイテムを取得する
      $posts = Item::all();
    }

        return view('user.itemlist.index');
    }

    public function edit(Request $request){
        $itemlist = ItemList::find($request->id);
        if (empty($itemlist)) {
          abort(404);
        }
  
        return view('user.itemlist', ['itemlist_form' => $itemlist]);
    }

    public function update(Request $request){
        // Validationをかける
        $this->validate($request, ItemList::$rules);
        // ItemList Modelからデータを取得する
        $itemlist = ItemList::find($request->id);
        // 送信されてきたフォームデータを格納する
        $itemlist_form = $request->all();
        unset($itemlist_form['_token']);
        // 該当するデータを上書きして保存する
        $itemlist->fill($itemlist_form)->save();
    
        return redirect('list');
      }

      public function delete(Request $request){
        // 該当するItemlist Modelを取得
        $itemlist = ItemList::find($request->id);
        // 削除する
        $itemlist->delete();
        
        return redirect('list');
    }

}
