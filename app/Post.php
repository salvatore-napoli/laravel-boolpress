<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public function author() {
		return $this->belongsTo(Author::class);
	}

	public function comment() {
		return $this->hasMany(Comment::class);
	}
}
