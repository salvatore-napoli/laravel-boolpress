<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorDetail extends Model
{
  function user() {
		return $this->belongsTo(Author::class);
	}
}
