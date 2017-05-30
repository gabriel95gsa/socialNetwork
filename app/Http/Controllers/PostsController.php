<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        //$posts = Post::whereLive(1)->get();

        //$posts = DB::table('posts')->get();
        //$posts = DB::table('posts')->whereLive(1)->get();
        //$post = DB::table('posts')->whereLive(1)->first();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $post = new Post;

        $post->user_id = Auth::user()->id;
        $post->content = $request->content;
        $post->live = (boolean)$request->live;
        $post->post_on = $request->post_on;

        $post->save();
        */

        Post::create($request->all());

        return redirect('/posts');
        //DB::table('posts')->insert($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if(!isset($request->live)) {
            $post->update(array_merge($request->all(), ['live' => false]));            
        } else {
            $post->update($request->all());
        }

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$post = Post::findOrFail($id);
        //$post->delete();
        //$post->forceDelete(); // forces the delete action even whern the table has the column 'deleted_at'
        Post::destroy($id);

        return redirect('/posts');
    }

    public function restore($id) {
        $post = Post::findOrFail($id);
        $post->restore();
    }
}
