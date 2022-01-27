@extends('layouts.app')

@section('title', '持ち物の新規作成')

@section('content')
   <h2>アイテムリスト一覧</h2>
    <form action="{{ action('Admin\ItemController@index') }}" method="get">
   <label>アイテム名</label>
   <input type="text" name="name" value="{{ $name }}">
   {{ csrf_field() }}
   <input type="submit" value="検索">
   <br>
   <br>
   <thead>
     <tr>
       <th>持ち物リスト名</th>
       <th>アイテム名</th>
       <th>カテゴリー名</th>
       <th>操作</th>
     </tr>
   </thead>
   <br>
   <tbody>
      @foreach($posts as $item)
        <tr>
          <th>{{ $item->id }}</th>
          <td>{{ str_limit($item->name, 100) }}</td>
          <td>{{ str_limit($item->category->name) }}</td>
          <td>
            <div>
              <a href="{{ action('Admin\ItemController@edit', ['id' => $item->id]) }}">編集</a>
              <a href="{{ action('Admin\ItemController@delete', ['id' => $item->id]) }}">削除</a>
            </div>
          </td>
          <br>
        </tr>
      @endforeach
    </tbody>
    <a href="{{ action('User\ItemListController@main') }}" type="button">メイン画面へ戻る</a>
@endsection
