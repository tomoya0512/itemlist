@extends('layouts.app')

@section('title', '持ち物の新規作成')

@section('content')
<form action="{{ action('Admin\CategoryController@create') }}" method="post" enctype="multipart/form-data">
    <label>リスト名</label>
    <input type="text" name="name" value="{{ old('name') }}">
    <br>

    <label>日にち</label>
    <input type="" name="execution_date" value="{{ old('execution_date') }}">
    <br>

    <label>目的地</label>
    <input type="text" name="destination_name" value="{{ old('destination_name?') }}">
    <br>

    <label>持ち物</label>
    <select name="item_name" id="item-id">
        <option value="">選択してください</option>
        @foreach ($items as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    <br>

    <label>メモ</label>
    <input type="text" name="memo" value="{{ old('memo') }}">
    <br>

    {{ csrf_field() }}
    <input type="submit" value="作成">
  </form>
  <a href="{{ action('User\ItemListController@main') }}" type="button">メイン画面へ戻る</a>
@endsection