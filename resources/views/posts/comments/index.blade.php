@extends('base')
	@section('head')
		@section('title', 'Authors')

	@section('body')
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Title</th>
		      <th scope="col">Message</th>
		    </tr>
		  </thead>
		  <tbody>
				@foreach ($comments as $comment)
					@if (intval($id) === $comment->post_id)
						<tr>
							<th scope="row">{{$comment->id}}</th>
							<td>{{$comment->title}}</td>
							<td>{{$comment->message}}</td>
						</tr>
					@endif
				@endforeach
		  </tbody>
		</table>
