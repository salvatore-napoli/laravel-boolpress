@php
	// edit
	if (isset($edit) && !empty($edit)) {
	 	$method = 'PUT';
		$url = route('posts.update', compact('post'));
	} else {
		// create
		$method = 'POST';
		$url = route('posts.store');
	}
@endphp


<form action="{{ $url }}" method="post" enctype="multipart/form-data">
	@csrf
	@method($method)

	<div class="form-group">
		<label for="author_id">Autori</label>
		<select class="form-control" id="author_id" name="author_id">
			@foreach ($authors as $author)
				<option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="title">Titolo</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Inserisci un titolo" value="{{ isset($post) ? $post->title : ''}}">
	</div>

	<div class="form-group">
		<label for="body"></label>
		<textarea class="form-control" id="body" name="body" placeholder="Inserisci un messaggio" rows="6" value="{{ isset($post) ? $post->body : ''}}"></textarea>
	</div>

	<div class="form-group">
		<label for="picture">Immagine</label>
		<input type="file" id="picture" name="picture" class="form-control">
	</div>

	<div class="form-group">
		<label for="tags">Tags</label>
		<select class="custom-select" name="tags[]" id="tags" multiple>
			@foreach ($tags as $tag)
				<option value="{{$tag->id}}">{{$tag->name}}</option>
			@endforeach
		</select>
	</div>

	<button type="submit" class="btn btn-primary" name="button">Create</button>
</form>
