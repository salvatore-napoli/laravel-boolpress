<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'body', 'author_id'];

	public function author() {
		return $this->belongsTo(Author::class);
	}

	public function comment() {
		return $this->hasMany(Comment::class);
	}

	public function tags() {
		return $this->belongsToMany(Tag::class);
	}
}
