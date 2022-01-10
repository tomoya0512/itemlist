<!-- layouts/user.blade.phpを読み込む -->
@extends('layouts.user')

<!-- admin.blade.phpの@yield('title')に'持ち物の新規作成'を埋め込む -->
@section('title', 'メイン画面')

<!-- admin.blade.phpの@yield('content')に以下のタグを埋め込 -->
@section('content')
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charaset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Laravel標準で用意されているJavascriptの読み込み  -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- フォントデザイン -->
  <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> -->

  <!-- Laravel標準で用意されているCSSを読み込み -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- 自分のCSSの読み込み -->
  <!-- <link href="{{ asset('css/admin.css') }}" rel="stylesheet"> -->
</head>
<nav>
  <div class="container">
    <a href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <button type="button"></button>
  </div>
</nav>
<main>
  @yield('content')
</main>
</body>

@endsection
