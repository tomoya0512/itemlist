<!-- layouts/admin.blade.phpを読み込む -->
@extends('layouts.admin')

<!-- admin.blade.phpの@yield('title')に'持ち物の新規作成'を埋め込む -->
@section('title', '持ち物の新規作成')

<!-- admin.blade.phpの@yield('content')に以下のタグを埋め込 -->
@section('content')
  <div class="container">
    <h2>持ち物の新規作成</h2>
  </div>
  @if (count($errors) > 0)
    <ul>
      @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  @endif
  <form action="{{ action('Admin\ItemController@create') }}" method="post" enctype="multipart/form-data">
    <label>アイテム名</label>
    <input type="text" name="item_name" value="{{ old('item_name') }}">
    <br>

    <label>カテゴリー名</label>
    <{{Form::select('category_name','$category_list->name','選択してください') }}>
    <br>

    {{ csrf_field() }}
    <input type="submit" value="追加">
  </form>
@endsection
