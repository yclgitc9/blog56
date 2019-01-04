<?php

use Illuminate\Database\Seeder;

use App\Comment;
use App\Post;
use Faker\Factory;

class RepliesTableSeeder extends Seeder
{
	protected $level = 2;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker    = Factory::create();
		$comments = Comment::whereNull('parent_id')->take(3)->get();        

        // get the last three posts
        $posts = App\Post::with(['comments' => function($c) { 
            $c->latest()->take(3)->get();  }
        ])->latest()->take(3)->get();

        // and generate 3 reply comments each 
        foreach ($posts as $post) 
        {
            foreach ($post->comments as $comment) 
            {
                $this->replies($comment, $faker);    
            }        	
        }
    }

    private function replies($comment, $faker)
    {                
        if ($this->level > 0) 
        {
            for ($i = 1; $i <= $this->level; $i++)
            {
                $commentDate = $comment->created_at->modify("+{$i} minutes");

                $newComment = [
                    'name'       => $faker->name,
                    'email'      => $faker->email,
                    'body'       => $faker->paragraphs(rand(1, 5), true),
                    'post_id'    => $comment->post_id,
                    'created_at' => $commentDate,
                    'updated_at' => $commentDate,
                ];
                
                $reply = $comment->replies()->create($newComment);

                $this->replies($reply, $faker);
            }   
        }
    }
}
