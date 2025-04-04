<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Posts extends Controller
{
    private static $posts = [];

    public function __construct()
    {
        Posts::$posts = [
            ['id' => 1, 'title' => 'First Post', 'posted_by' => 'Ahmed', 'des' => "That's the first post", 'created_at' => now()],
            ['id' => 2, 'title' => 'Second Post', 'posted_by' => 'Mohamed', 'des' => "That's the second post", 'created_at' => now()],
            ['id' => 3, 'title' => 'Third Post', 'posted_by' => 'Mahmoud', 'des' => "That's the third post", 'created_at' => now()],
        ];

        if (!session()->has('posts')) {
            session(['posts' => Posts::$posts]);
        }
    }

    public function index()
    {
        $posts = session('posts');
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $posts = session('posts');

        $newPost = [
            'id' => end($posts)['id'] + 1,
            'title' => $request->title,
            'posted_by' => $request->post_creator,
            'des' => $request->description,
            'created_at' => now(),
        ];

        $posts[] = $newPost;
        session(['posts' => $posts]);

        return redirect()->route('posts.index');
    }

    public function edit($id,Request $request)
    {
        $posts = session('posts');

        $posts[$id - 1]['title'] = $request->title;
        $posts[$id - 1]['posted_by'] = $request->post_creator;
        $posts[$id - 1]['des'] = $request->description;
        $posts[$id - 1]['created_at'] = now();

        session(['posts' => $posts]);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $posts = session('posts');

        $post = array_filter($posts, function ($post) use ($id) {

            return $post['id'] == $id;
        });

        

        return view('posts.show', ['post' => reset($post)]);
    }
    
    public function editpage($id)
    {
        $posts = session('posts');
        $post = array_filter($posts, function ($post) use ($id) {
            return $post['id'] == $id;
        });
        return view('posts.edit', ['post' => reset($post)]);
    }


    public function delete($id)
    {
        $posts = session('posts');
        $posts = array_filter($posts, function($p) use ($id) { return $p['id'] != $id;});
        session(['posts' => array_values($posts)]);
        return redirect()->route('posts.index');
    }
}