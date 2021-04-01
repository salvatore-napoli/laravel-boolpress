@extends('base')
	@section('head')
		@section('title', 'Authors')

	@section('body')
		@include('posts.form', ['edit' => true])
