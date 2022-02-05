@extends('layouts.app')

@section('title', '持ち物リストの編集')

@section('content')
  <h2>持ち物リストの</h2>
  <form action="{{ action('User\ItemListController@update') }}" method="post" enctype="multipart/form-data">
    @if (count($errors) > 0)
      <ul>
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
      </ul>
    @endif
    <label for="item_name">アイテムリスト名</label>
    <input type="text" name="item_name" value="{{ $itemlist_form->item_name }}">
    <br>
    <label for="item_name">日にち</label>
    <input type="text" name="execution_date" value="{{ $itemlist_form->execution_date }}">
    <br>
    <label for="item_name">目的地</label>
    <input type="text" name="destination_name" value="{{ $itemlist_form->destination_name }}">
    <br>
    <label for="item_name">持ち物</label>
    <input type="text" name="item_name" value="{{ $itemlist_form->item_name }}">
    <br>
    <label for="item_name">メモ</label>
    <input type="text" name="memo" value="{{ $itemlist_form->memo }}">
    <br>
    <input type="hidden" name="id" value="{{ $itemlist_form->id }}">
    {{ csrf_field() }}
    <input type="submit" value="更新">
  </form>
  @endsection
