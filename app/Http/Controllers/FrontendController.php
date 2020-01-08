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
        return view('inner')->with([
            'title' => $post->title,
            'categories' => Category::take(5)->get(),
            'contact_email' => Setting::first()->contact_email,
            'contact_phone' => Setting::first()->contact_number,
            'address' => Setting::first()->address,
            'post' => $post,
            'user' => User::find($post->created_by)
        ]);
    }
}
