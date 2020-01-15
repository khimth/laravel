<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index() {
        return view('index')
            ->with([
                'site_name' => Setting::first()->site_name,
                'title' => Setting::first()->site_name,
                'categories' => Category::take(5)->get(),
                'first_post' => Post::orderBy('created_at', 'desc')->first(),
                'second_post' => Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first(),
                'third_post' => Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first(),
                'laravel' => Category::find(3),
                'mobile' => Category::find(6),
                'contact_email' => Setting::first()->contact_email,
                'contact_phone' => Setting::first()->contact_number,
                'address' => Setting::first()->address
            ])
            ;
    }

    public function singlePost($slug) {
        $post = Post::where('slug', $slug)->first();
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');
        return view('inner')->with([
            'site_name' => Setting::first()->site_name,
            'title' => $post->title,
            'categories' => Category::take(5)->get(),
            'contact_email' => Setting::first()->contact_email,
            'contact_phone' => Setting::first()->contact_number,
            'address' => Setting::first()->address,
            'post' => $post,
            'user' => User::find($post->created_by),
            'next' => Post::find($next_id),
            'previous' => Post::find($prev_id)
        ]);
    }

    public function getCategory($id) {
        $category = Category::find($id);
        return view('category')->with([
            'site_name' => Setting::first()->site_name,
            'title' => $category->name,
            'contact_email' => Setting::first()->contact_email,
            'contact_phone' => Setting::first()->contact_number,
            'address' => Setting::first()->address,
            'categories' => Category::take(5)->get(),
            'category' => $category
        ]);
    }
}
