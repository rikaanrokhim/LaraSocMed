<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\Category;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $category = Category::all();

        $posts = Post::with('category')->where('user_id', Auth::user()->id)->get();

        return view('users.home', compact('users', 'posts', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost()
    {
        $categories = Category::all();

        return view('users.create_post', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost()
    {
        $this->validate(request(), [
            'category_id' => 'required',
            'content' => 'required|min:10',
        ]);

        Post::create([
            'user_id' => Auth::user()->id,
            'category_id' => request('category_id'),
            'content' => request('content'),
        ]);

        return redirect()->route('users.home')->withSuccess('Post kau berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPost(Post $post)
    {
        $categories = Category::all();

        return view('users.edit_post', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Post $post)
    {
        $this->validate(request(), [
            'category_id' => 'required',
            'content' => 'required|min:10',
        ]);

        $post->update([
            'user_id' => Auth::user()->id,
            'category_id' => request('category_id'),
            'content' => request('content'),
        ]);

        return redirect()->route('users.home')->withInfo('Post kamu berhasil diupdate!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $avatar = $request->file('avatar')->store('avatars');

        $request->user()->update([
            'about' => request('about'),
            'notes' => request('notes'),
            'avatar' => $avatar,
        ]);

        return redirect()->route('users.home')->withSuccess('Profil kamu berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPost(Post $post)
    {
        $post->delete();

        return redirect()->route('users.home')->withDanger('Post kamu berhasil dihapus!');
    }
}
