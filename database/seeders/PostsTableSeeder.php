<?php

namespace Database\Seeders;

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        // $posts = factory(App\Post::class, 5)->create();
        // $p1 = Post::create([
        //     'user_id' => 'firstuser',
        //     'category_id' => '1',
        //     'title' => 'Differences between SQL and Document Databases',
        //     'slug' => 'sql-vs-nosql',
        //      'body' => 'SQL (Structured Query Language) and NoSQL (Not Only SQL) are two broad categories of database management systems, each designed to handle different types of data and use cases. Understanding the differences between these two database paradigms is essential for developers and data engineers when making decisions about which database to use for a specific project.',
        //      'view_count' => 0,
        //      'status' => 1,
        // ]);

        // $p12 = Post::create([
        //     'user_id' => 'firstuser',
        //     'category_id' => '2',
        //     'title' =>'Javascript vs Typescript',
        //     'slug' => 'typescript-fun',
        //     'body' => 'Typescript is gaining popularity recently due to its strongly typed nature',
        //     'view_count' => 12,
        //     'status' => 1,
        // ]);

        // $p2 = Post::create([
        //     'user_id' => 'firstuser',
        //     'category_id' => '3',
        //     'title' => 'Deploying Lambda Function to AWS',
        //     'slug' => 'aws-lambda',
        //     'body' => 'Serverless architecture is a valuable skill to have, and AWS offers the possibility through Lambda functions',
        //     'view_count' => 5,
        //     'status' => 1,
        // ]);

        // $p3 = Post::create([
        //     'user_id' => 'firstuser',
        //     'category_id' => '4',
        //     'title' => 'Understanding the PHP.ini file',
        //     'slug' => 'php-ini-mastery',
        //     'body' => 'The PHP.ini file contains many relevant server configuration options that you are likely to need when building a modern web application',
        //     'view_count' => 3,
        //     'status' => 1,
        // ]);

       
    }
}
