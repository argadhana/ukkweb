<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\{Post, Tag, Category};
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $posts = Post::paginate(5);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', [
            'post' => new Post()
            ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd(request()->file('gambar'));
        $request->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg,svg|max:3048'
        ]);
        $attr = $request->all();


        $thumbnail = request()->file('gambar') ? request()->file('gambar')->store("images/posts") : null;

        $attr['gambar'] = $thumbnail;

        $post = auth()->user()->posts()->create($attr);

        return redirect('all-posts');

        session()->flash('success', 'Berhasil menambahkan post!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('post.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg'
        ]);

        $this->authorize('update', $post);
        if (request()->file('gambar')) {
            \Storage::delete($post->thumbnail);
            $thumbnail = request()->file('gambar')->store("images/posts");
        } else {
            $thumbnail = $post->thumbnail;
        }
        $isi = $request->all();

        $isi['gambar'] = $thumbnail;
        $post->update($isi);
        return redirect('all-posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $this->authorize('delete', $post);
        \Storage::delete($post->gambar);
            $post->delete();
            return redirect('all-posts');


    }
}
