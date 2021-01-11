<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostCollection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('tag')){
            $posts = Post::all();
            $posts = $posts->filter(function ($post, $key) use($request) {
                return $post->tags->contains('name', $request->tag);
            });

            return PostResource::collection($posts);
        } else {
            return PostResource::collection(Post::all());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;
        $post->save();

        foreach ($request->tags as $tagname) {
            $tag = new \App\Tag();
            $tag->name = $tagname;
            $post->tags()->save($tag);
        }

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;
        $post->save();

        foreach ($post->tags() as $tag) {
            $tag->delete();
        }

        foreach ($request->tags as $tagname) {
            $tag = new \App\Tag();
            $tag->name = $tagname;
            $post->tags()->save($tag);
        }

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        foreach ($post->tags as $tag) {
            $tag->delete();
        }

        $post->delete();

        return response()->noContent();
    }
}
