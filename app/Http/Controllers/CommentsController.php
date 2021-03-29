<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
	public function index($id) {
		$comments = Comment::all();

	  return view('posts/comments.index', compact('id', 'comments'));
	}
}
