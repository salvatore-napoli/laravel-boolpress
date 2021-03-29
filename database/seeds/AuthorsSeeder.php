<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Author;
use App\AuthorDetail;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 20; $i++) {        
        $author = new Author;
        $author->name = $faker->firstname();
        $author->surname = $faker->lastname();
        $author->email = $faker->email();
        $author->save();

        $authorDetail = new AuthorDetail;
        $authorDetail->website = $faker->url();
        $authorDetail->avatar = 'https://picsum.photos/seed/' . rand(1, 1000) . '/200/300';
        $author->detail()->save($authorDetail);
      }
    }
}
