<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
	@section('head')
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="{{asset('css/app.css')}}">
			<script src="{{asset('js/app.js')}}" charset="utf-8" defer></script>
			<title>@yield('title')</title>
		</head>
	@section('body')
		<body>
			@yield('content')
		</body>
</html>
