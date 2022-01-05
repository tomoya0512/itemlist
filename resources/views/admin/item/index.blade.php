@extends('layouts.admin')

@section('title', '登録済みのアイテム一覧')

@section('content')
   <h2>アイテム一覧</h2>
   <br>
   <a href="{{ action('Admin\ItemController@add') }}" type="button">新規作成</a>
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
       <th width="20%">ID</th>
       <th width="20%">アイテム名</th>
       <th width="30%">カテゴリー名</th>
       <th width="10%">操作</th>
     </tr>
   </thead>
   <br>
   <tbody>
      @foreach($posts as $item)
        <tr>
          <th>{{ $item->id }}</th>
          <td>{{ str_limit($item->name, 100) }}</td>
          <th>{{ $category->name }}</th>
          <td>
            <div>
              <a href="{{ action('Admin\ItemController@edit', ['id' => $item->id]) }}">編集</a>
            </div>
          </td>
          <br>
        </tr>
      @endforeach
    </tbody>
@endsection