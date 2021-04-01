<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Author;
use App\Post;
use App\Tag;
use App\Mail\PostCreated;
use App\Mail\TagsUsed;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();

      return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $authors = Author::all();
      $tags = Tag::all();

      return view('posts.create', compact('authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $path = $request->file('picture')->store('public');
      $allTags = Tag::all();

      $author_id = $data['author_id'];
      if(!Author::find($author_id)) {
        dd('L\'autore non esiste');
      }

      $post = new Post();
      $post->fill($data);
      $post->image = $path;
      $post->save();
      $post->tags()->attach($data['tags']);

      $tagsObjects = [];
      foreach ($allTags as $tagObject) {
        if (in_array($tagObject->id, $data['tags'])) {
          $tagsObjects[] = $tagObject;
        }
      }

      // IN ALTERNATIVA: $storedPost = Post::orderBy('id', 'desc')->first();
      // e passare storedPost al Mail::to TagsUsed
      // passando Collection al posto di array nel construct di TagsUsed

      Mail::to('febfzkwdfvdp@dropmail.me')->send(new TagsUsed($tagsObjects));

      Mail::to('febfzkwdfvdp@dropmail.me')->send(new PostCreated($post));

      return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $authors = Author::all();
      $tags = Tag::all();

      return view('posts.edit', compact('post', 'authors', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $data = $request->all();

      $post->update($data);

      return redirect()->route('posts.index', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
