<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
	    $this->middleware('auth');
	    $this->middleware('authHR');
	}
	
	public function index()
	{
		$users = User::latest()->get();
		return view('user.index', compact('users'));
	}

	public function redirectUser(){
        if(Auth::guest()){
            return redirect('/auth/login');
        }else{
            if(Auth::user()->position=="marketing"){
                return redirect('/order');    
            }else{
                return redirect('/user');
            }
        }
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
		$this->validate($request, [
            'name' => 'required|max:255|min:4|max:32|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'nohp' => 'required',
            'position' => 'required',
            'username' => 'required'
        ]);
        if($request['password']==$request['password_confirmation']){
        	$request['password']=bcrypt($request['password']);
        	User::create($request->all());	
        }
		return redirect('user');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		return view('user.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		return view('user.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
		$this->validate($request, [
            'name' => 'required|max:255|min:4|max:32|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'nohp' => 'required',
            'position' => 'required',
            'username' => 'required'
        ]);
		$user = User::findOrFail($id);
		$user->update($request->all());
		return redirect('user');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return redirect('user');
	}

}
