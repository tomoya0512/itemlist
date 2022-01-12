@extends('layouts.admin')
@section('title', '登録済みのアイテム一覧')
@section('content')
   <h2>アイテム一覧</h2>
   <br>
   <a href="{{ action('Admin\CategoryController@index') }}" type="button">カテゴリー一覧へ</a>
   <br>
   <a href="{{ action('Admin\ItemController@add') }}" type="button">アイテム新規作成</a>
   <br>
   <form action="{{ action('Admin\ItemController@index') }}" method="get">
   <label>アイテム名</label>
   <input type="text" name="name" value="{{ $name }}">
   {{ csrf_field() }}
   <input type="submit" value="検索">
   <br>
   <br>
   <thead>
     <tr>
       <th>ID</th>
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
@endsection
