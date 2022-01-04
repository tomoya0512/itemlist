@extends('layouts.admin')

@section('title', 'カテゴリーの編集')

@section('content')
  <h2>カテゴリー編集</h2>
  <form action="{{ action('Admin\CategoryController@update') }}" method="post" enctype="multipart/form-data">
    @if (count($errors) > 0)
      <ul>
          @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
      </ul>
    @endif
    <label for="name">カテゴリー名</label>
    <input type="text" name="name" value="{{ $category_form->name }}">

    <br>
    <input type="hidden" name="id" value="{{ $category_form->id }}">
    {{ csrf_field() }}
    <input type="submit" value="更新">
  </form>
  @endsection
