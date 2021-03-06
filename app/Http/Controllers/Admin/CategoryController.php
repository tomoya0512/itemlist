<?php
namespace App\Http\Controllers\Admin;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
  public function add(){
    return view('admin.categories.create');
  }

  public function create(Request $request){
    $this->validate($request, Category::$rules);
    $category = new Category;
    $category->name = $request->get("category_name");
    $category->save();

    return redirect('admin/category/create');
  }

  public function index(Request $request){
    $name = $request->name;
    if ($name != '') {
      // 検索されたら検索結果を取得する
      $posts = Category::where('name', $name)->get();
    } else{
      // それ以外はすべてのニュースを取得する
      $posts = Category::all();
    }

    return view('admin.categories.index', ['posts' => $posts, 'name' => $name]);
  }

  public function edit(Request $request){
      // Category Modelからデータを取得する
      $category = Category::find($request->id);
      if (empty($category)) {
        abort(404);
      }

      return view('admin.categories.edit', ['category_form' => $category]);
  }

  public function update(Request $request){
    $this->validate($request, Category::$rules);
    // Validationをかける
    $this->validate($request, Category::$rules);
    // Category Modelからデータを取得する
    $category = Category::find($request->id);
    // 送信されてきたフォームデータを格納する
    $category_form = $request->all();
    unset($category_form['_token']);
    // 該当するデータを上書きして保存する
    $category->fill($category_form)->save();

    return redirect('admin/category');
  }

  public function delete(Request $request){
      // 該当するCategory Modelを取得
      $category = Category::find($request->id);
      // 削除する
      $category->delete();
      
      return redirect('admin/category/');
  }
}
