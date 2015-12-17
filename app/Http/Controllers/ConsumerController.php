<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Consumer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsumerController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
	    $this->middleware('auth');
	    $this->middleware('authMarketing');
	}
	public function index()
	{
		$consumers = Consumer::latest()->get();
		return view('consumer.index', compact('consumers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('consumer.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, ['name' => 'required|min:4|max:32|unique:consumers',
								   'email' => 'required|email|unique:consumers',
								   'nohp' => 'required',
								   'address' => 'required']); // Uncomment and modify if you need to validate any input.
		Consumer::create($request->all());
		return redirect('consumer');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$consumer = Consumer::findOrFail($id);
		return view('consumer.show', compact('consumer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$consumer = Consumer::findOrFail($id);
		return view('consumer.edit', compact('consumer'));
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
		$consumer = Consumer::findOrFail($id);
		$consumer->update($request->all());
		return redirect('consumer');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Consumer::destroy($id);
		return redirect('consumer');
	}

}
