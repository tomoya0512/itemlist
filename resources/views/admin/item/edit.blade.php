@extends('layouts.admin')

@section('title', 'アイテムの編集')

@section('content')
  <h2>アイテムの編集</h2>
  <form action="{{ action('Admin\ItemController@update') }}" method="post" enctype="multipart/form-data">
    @if (count($errors) > 0)
      <ul>
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
      </ul>
    @endif
    <label for="name">アイテム名</label>
    <input type="text" name="name" value="{{ $item_form->name }}">
    <br>

    <input type="hidden" name="id" value="{{ $item_form->id }}">
    {{ csrf_field() }}
    <input type="submit" value="更新">
  </form>
  @endsection
