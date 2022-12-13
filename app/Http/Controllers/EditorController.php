<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:editor');
    }
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::guard('editor')->attempt($credentials, $request->remember)) {
    //         $user = Admin::where('email', $request->email)->first();
    //         Auth::guard('editor')->login($user);
    //         return redirect()->route('editor.home');
    //     }
    //     return redirect()->route('editor.login')->with('status', 'Failed To Process Login');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function guard()
    {
        return Auth::guard('editor');
    }

    public function index()
    {
        //
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
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function show(Editor $editor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function edit(Editor $editor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editor $editor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editor $editor)
    {
        //
    }
}
