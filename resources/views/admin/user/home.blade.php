<!-- layouts/admin.blade.phpを読み込む -->
@extends('layouts.user')

<!-- admin.blade.phpの@yield('title')に'持ち物の新規作成'を埋め込む -->
@section('title', 'メイン画面')

<!-- admin.blade.phpの@yield('content')に以下のタグを埋め込 -->
@section('content')
<a href="{{ action('User/UserController@accountCreate') }}" type="button">アカウント新規作成</a>
<a href="{{ action('User/UserController@login') }}" type="button">ログイン</a>
@endsection
