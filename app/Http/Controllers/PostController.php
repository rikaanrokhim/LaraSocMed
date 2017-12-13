<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Category;

class PostController extends Controller
{
    public function home(Request $request)
    {
        $search = $request->input('search');

        $posts = Post::latest()
                ->search($search)
                ->paginate(env('PER_PAGE'));

        $categories = Category::all();

        $users = User::all();

        return view('posts.home', compact('posts', 'categories', 'users', 'search'));
    }

}
