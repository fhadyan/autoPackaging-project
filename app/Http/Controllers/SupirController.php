<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Supir;
use App\Letter;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SupirController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
	    $this->middleware('auth',['except' => ['delivery']]);
	    $this->middleware('authHR',['except' => ['delivery']]);
	}
	public function index()
	{
		$supirs = Supir::latest()->get();
		return view('supir.index', compact('supirs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('supir.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
		$this->validate($request, ['name' => 'required|min:4',
								   'address' => 'required|unique:supirs',
								   'nohp' => 'required']); 
		Supir::create($request->all());
		return redirect('supir');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$supir = Supir::findOrFail($id);
		return view('supir.show', compact('supir'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$supir = Supir::findOrFail($id);
		return view('supir.edit', compact('supir'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$this->validate($request, ['name' => 'required|min:4',
								   'address' => 'required|unique:supirs',
								   'nohp' => 'requierd']); // Uncomment and modify if you need to validate any input.
		$supir = Supir::findOrFail($id);
		$supir->update($request->all());
		return redirect('supir');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Supir::destroy($id);
		return redirect('supir');
	}

	public function delivery()
	{
		$letters = Letter::latest()->get();
		return view('supir.delivery', compact('letters'));
	}
}
