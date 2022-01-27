@extends('layouts.app')

@section('title', '持ち物の新規作成')

@section('content')
<div class="container">
    <a href="{{ action('User\ItemListController@add') }}" type="button">アイテムリストの新規作成</a>
</div>
<div class="container">
    <a href="{{ action('User\ItemListController@index') }}" type="button">アイテムリストの一覧</a>
</div>
@endsection