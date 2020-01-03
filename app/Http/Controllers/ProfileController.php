<?php

namespace App\Http\Controllers;

use App\Profile;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with(['user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'facebook' => 'required|url',
            'youtube' => 'required|url',
            'about' => 'required',
            'avatar' => 'image'
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $profile = Profile::find(Auth::user()->id);
        $profile->facebook = $request->facebook;
        $profile->youtube = $request->youtube;
        $profile->about = $request->about;
        if( $request->hasFile('avatar')) {
            $avatarImage = $request->avatar;
            $avatarNewImageName = time() . $avatarImage->getClientOriginalName();
            $avatarImage->move('uploads/avatars', $avatarNewImageName);
            $profile->avatar = 'uploads/avatars/' . $avatarNewImageName;
        }
        $profile->save();
        Session::flash('success', 'Profile updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
