@extends('base')
	@section('head')
		@section('title', 'Posts')

	@section('body')
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Author</th>
					<th scope="col">Title</th>
					<th scope="col">Body</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
					<tr>
						<th scope="row">{{$post->id}}</th>
						<td>{{$post->author}}</td>
						<td>{{$post->title}}</td>
						<td>{{$post->body}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
