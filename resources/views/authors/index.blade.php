@extends('base')
	@section('head')
		@section('title', 'Authors')

	@section('body')
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Surname</th>
		      <th scope="col">Email</th>
		      <th scope="col">Website</th>
		      <th scope="col">Avatar</th>
		    </tr>
		  </thead>
		  <tbody>
				@foreach ($authors as $author)
			    <tr>
			      <th scope="row">{{$author->id}}</th>
			      <td>{{$author->name}}</td>
			      <td>{{$author->surname}}</td>
			      <td>{{$author->email}}</td>
			      <td><a href="{{$author->detail->website}}">{{$author->detail->website}}</a></td>
			      <td><img src="{{$author->detail->avatar}}" alt="avatar" /></td>
			    </tr>
				@endforeach
		  </tbody>
		</table>
