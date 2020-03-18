<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Session;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with(['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if ($categories->count() == 0) {
            Session::flash('info', 'You must create a Category before creating Post');
            return redirect()->back();
        }
        return view('admin.posts.create')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category' => 'required'
        ]);
        $featuredImage = $request->featured;
        $featuredImageNewName = time() . $featuredImage->getClientOriginalName();
        $featuredImage->move('uploads/posts', $featuredImageNewName);
        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'featured_image' => 'uploads/posts/' . $featuredImageNewName,
            'content' => $request->content,
            'slug' => STR::slug($request->title),
            'created_by' => Auth::id()
        ]);
        Session::flash('success', 'Post created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit')->with(['post' => $post, 'categories' => Category::all()]);
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

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);

        $post = Post::find($id);
        if( $request->hasFile('featured')) {
            $featured = $request->featured;
            $featureNewImageName = time() . $featured->getClientOriginalName();
            $featured->move('uploads/posts' . $featureNewImageName);
            $post->featured_image = 'uploads/posts/' . $featureNewImageName;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->save();
        Session::flash('success', 'Post updated successfully');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'Post Successfully Trashed');
        return redirect()->back();
    }

    public function trashed() {
        $posts = POST::onlyTrashed()->get();
        return view('admin.posts.trash')->with(['posts' => $posts]);
    }

    public function restore($id) {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success', 'Post Successfully Restored');
        return redirect()->route('posts');
    }

    public function delete($id) {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        Session::flash('success', 'Post Deleted Permanently');
        return redirect()->back();
    }
}
