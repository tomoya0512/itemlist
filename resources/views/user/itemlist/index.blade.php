@extends('layouts.app')

@section('title', '持ち物の新規作成')

@section('content')
   <h2>アイテムリスト一覧</h2>
    <form action="{{ action('Admin\ItemListController@index') }}" method="get">
   <label>アイテムリスト名</label>
   <input type="text" name="name" value="{{ $name }}">
   {{ csrf_field() }}
   <input type="submit" value="検索">
   <br>
   <thead>
     <tr>
       <th>持ち物リスト名</th>
       <th>日にち</th>
       <th>目的地</th>
       <th>持ち物</th>
       <th>メモ</th>
       <th>操作</th>
     </tr>
   </thead>
   <br>
   <tbody>
      @foreach($posts as $itemlist)
        <tr>
          <th>{{ $itemlist->id }}</th>
          <td>{{ str_limit($itemlist->name, 100) }}</td>
          <td>{{ str_limit($itemlist->execution_date) }}</td>
          <td>{{ str_limit($itemlist->destination_name) }}</td>
          <td>{{ str_limit($itemlist->item_name) }}</td>
          <td>{{ str_limit($itemlist->memo) }}</td>
          <td>
            <div>
              <a href="{{ action('Admin\ItemListController@edit', ['id' => $item->id]) }}">編集</a>
              <a href="{{ action('Admin\ItemListController@delete', ['id' => $item->id]) }}">削除</a>
            </div>
          </td>
          <br>
        </tr>
      @endforeach
    </tbody>
    <a href="{{ action('User\ItemListController@main') }}" type="button">メイン画面へ戻る</a>
@endsection
