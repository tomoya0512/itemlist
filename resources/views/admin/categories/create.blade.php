<!-- layouts/admin.blade.phpを読み込む -->
@extends('layouts.admin')
<!-- admin.blade.phpの@yield('title')に'持ち物の新規作成'を埋め込む -->
@section('title', 'カテゴリーの新規作成')
<!-- admin.blade.phpの@yield('content')に以下のタグを埋め込 -->
@section('content')
  <div class="container">
    <h2>カテゴリーの新規作成</h2>
  </div>
  @if (count($errors) > 0)
    <ul>
      @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  @endif
  <form action="{{ action('Admin\CategoryController@create') }}" method="post" enctype="multipart/form-data">
    <label>カテゴリー名</label>
    <input type="text" name="category_name" value="{{ old('category_name') }}">
    <br>

    {{ csrf_field() }}
    <input type="submit" value="追加">
  </form>
  <a href="{{ action('Admin\CategoryController@index') }}" type="button">カテゴリー一覧へ戻る</a>
@endsection
