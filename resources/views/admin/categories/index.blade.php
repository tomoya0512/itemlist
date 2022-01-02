@extends('layouts.admin')

@section('title', '登録済みのカテゴリー一覧')

@section('content')
   <h2>カテゴリー一覧</h2>
   <br>
   <a href="{{ action('Admin\CategoryController@add') }}" type="button">新規作成</a>
   <br>
   <form action="{{ action('Admin\CategoryController@index') }}" method="get">
   <label>タイトル</label>
   <input type="text" name="name" value="{{ $name }}">
   {{ csrf_field() }}
   <input type="submit" value="検索">
   <br>
   <br>
   <thead>
     <tr>
       <th width="20%">ID</th>
       <th width="30%">カテゴリー名</th>
       <th width="50%">アイコン</th>
       <th width="10%">操作</th>
     </tr>
   </thead>
   <br>
   <tbody>
      @foreach($posts as $category)
        <tr>
          <th>{{ $category->id }}</th>
          <td>{{ str_limit($category->name, 100) }}</td>
          <td>{{ str_limit($category->icon, 250) }}</td>
          <td>
            <div>
              <a href="{{ action('Admin\CategoryController@edit', ['id' => $category->id]) }}">編集</a>
            </div>
          </td>
          <br>
        </tr>
      @endforeach
    </tbody>
