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
					<th scope="col">Comments</th>
					<th scope="col">Tags</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
					<tr>
						<th scope="row">{{$post->id}}</th>
						<td>{{$post->author->name}} {{$post->author->surname}}</td>
						<td>{{$post->title}}</td>
						<td>{{$post->body}}</td>
						<td><a href="posts/{{$post->id}}/comments">View comments</a></td>
						<td>
							@foreach ($post->tags as $tag)
								{{$tag->name}}
							@endforeach
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
