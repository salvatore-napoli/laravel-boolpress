<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
		<script src="{{asset('js/app.js')}}" charset="utf-8" defer></script>
		<title>Authors</title>
	</head>
	<body>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Surname</th>
		      <th scope="col">Email</th>
		    </tr>
		  </thead>
		  <tbody>
				@foreach ($authors as $author)
			    <tr>
			      <th scope="row">{{$author->id}}</th>
			      <td>{{$author->name}}</td>
			      <td>{{$author->surname}}</td>
			      <td>{{$author->email}}</td>
			    </tr>
				@endforeach
		  </tbody>
		</table>
	</body>
</html>
