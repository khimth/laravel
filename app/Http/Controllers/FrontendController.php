<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
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
                'mobile' => Category::find(6)
            ])
            ;
    }
}
