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
      <label>カテゴリー</label>
      <select name="category_id" id="category-id">
        <option value="">選択してください</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>

    {{ csrf_field() }}
    <button type="submit">追加</button>
    <br>
    <a href="{{ action('Admin\ItemController@index') }}" type="button">アイテム一覧へ戻る</a>
  </form>
@endsection
