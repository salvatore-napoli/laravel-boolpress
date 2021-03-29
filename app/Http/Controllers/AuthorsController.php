<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
  public function index() {
		$authors = Author::all();

		return view('authors.index', compact('authors'));
	}
}
