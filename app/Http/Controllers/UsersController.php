<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('f_name')->orderBy('s_name')->paginate(25);
        return view('pages.allUsers')->with('users',$users);
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
      $this->validate($request, [
        'f_name' => 'required',
        's_name' => 'required',
        'email' => 'required|email',
        'portfolio' => 'required|numeric',
        'password' => 'required|min:8',
      ]);

      // save new user instance
      $user = new User();
      $user->f_name = $request->input('f_name');
      $user->s_name = $request->input('s_name');
      $user->email = $request->input('email');
      $user->portfolio = $request->input('portfolio');
      $user->password = Hash::make($request->input('password'));
      $user->save();

      $password = $request->input('password');
      $portfolio = \App\Models\Portfolio::select('title')->where('id',$user->portfolio)->first();
      $portfolio = $portfolio->title;
      Mail::to($user->email)->send(new \App\Mail\userCreated($user,$password,$portfolio));

      return redirect('/user')->with('success', 'User record inserted.');
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
    public function update(Request $request, $id)
    {
        //
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

    public function dashboard(){
      // return Auth::user();
      return view('pages.userDashboard');
    }
}
