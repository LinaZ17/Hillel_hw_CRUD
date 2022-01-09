<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Post;
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
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $posts = Post::all();
        $choices = Choice::all();
        return view('posts.create',[
            'posts' => $posts,
            'choices' => $choices
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'choice_id'=>'required'
        ]);

        $posts = new Post([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'choice_id' => $request->get('choice_id'),

        ]);
        $posts->save();
        return redirect('/post')->with('success', 'Новости успешно добавлены!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);

        return view('posts.show', [
            'posts' => $posts,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $posts = Post::find($id);
        $choices = Choice::all();
        return view('posts.edit', [
            'posts' => $posts,
            'choices' => $choices
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'choice_id'=>'required'
        ]);

        $posts = new Post([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'choice_id' => $request->get('choice_id'),

        ]);
        $posts->save();
        return redirect('/post')->with('success', 'Успешно Отредактировано!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect('/post')->with('success', 'Новости удалены!');
    }
}
