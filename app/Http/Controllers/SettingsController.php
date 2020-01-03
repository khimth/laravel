<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.settings.settings')->with(['setting' => Setting::first]);
    }

    public function update() {
        $settings = Setting::first();
    }
}
