<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Models\Post;
use \App\Models\User;

class GetBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This cron job will get data from the third party';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $blog = file_get_contents('https://sq1-api-test.herokuapp.com/posts');
        $blog = json_decode($blog);
        if(isset($blog->data) && is_array($blog->data)){
            $user = User::where('name','admin')->first();
            if($user == null){
                $user = User::create(['name'=>'admin','email'=>'admin@pixelsoft.com','password'=>bcrypt('123456')]);
            }
            foreach($blog->data as $p){
                $post = Post::create(['title'=>$p->title,'detail'=>$p->publication_date,'publication_date'=>$p->publication_date,'user_id'=>$user->id]);
            }
        }
        return 0;
    }
}
