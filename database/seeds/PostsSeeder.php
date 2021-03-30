<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Author;
use App\AuthorDetail;
use App\Post;
use App\Comment;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i = 0; $i < 20; $i++) {
        $author = new Author;
        $author->name = $faker->firstname();
        $author->surname = $faker->lastname();
        $author->email = $faker->email();
        $author->save();

        $authorDetail = new AuthorDetail;
        $authorDetail->website = $faker->url();
        $authorDetail->avatar = 'https://picsum.photos/seed/' . rand(1, 1000) . '/200/300';
        $author->detail()->save($authorDetail);

        for ($p = 0; $p < rand(2, 5); $p++) {
          $post = new Post;
          $post->title = $faker->text(50);
          $post->body = $faker->text();
          $author->posts()->save($post);

          for ($c = 0; $c < rand(0, 10); $c++) {
            $comment = new Comment;
            $comment->title = $faker->text(50);
            $comment->message = $faker->text(255);
            $post->comment()->save($comment);
          }
        }
      }
    }
}
