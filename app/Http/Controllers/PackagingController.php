<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Packaging;
use App\Order;
use App\Letter;
use App\Box;
use App\Koli;
use App\Supir;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PackagingController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$packagings = Packaging::latest()->get();
		return view('packaging.index', compact('packagings'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$orders = Order::all();
		$supirs = Supir::lists('name','id');

		return view('packaging.create')->with(compact('supirs'))->with(compact('orders'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, ['no_do' => 'required',
								   'no_packaging' => 'required|unique:packagings',
								   'no_contract' => 'required',
								   'invoice' => 'required',
								   'invoice_date' => 'required',
								   'date' => 'required',
								   'no_letter' => 'required',
								   'order_id' => 'required|unique:letters',
								   'supir_id' => 'required']); // Uncomment and modify if you need to validate any input.
		$packaging = Packaging::create($request->all());
		$letter = new letter($request->all());
		$letter->packaging_id = $packaging->id;
		$letter->save();
		return redirect('packaging');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$packaging = Packaging::findOrFail($id);
		$letter = $packaging->letter()->get()->first();
		$consumer = $letter->order()->get()->first()->consumer()->get()->first();
		//$products = $letter->order()->get()->first()->products()->withPivot('amount')->get()->first();
		$products = $letter->order()->get()->first()->products()->withPivot('amount')->get();
		$kolis = $packaging->kolis()->get();
		$boxes = Box::all();
		return view('packaging.show', compact('packaging'))->with(compact('letter'))->with(compact('consumer'))->with(compact('products'))->with(compact('kolis'))->with(compact('boxes'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$packaging = Packaging::findOrFail($id);
		return view('packaging.edit', compact('packaging'));
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
		$packaging = Packaging::findOrFail($id);
		$packaging->update($request->all());
		return redirect('packaging');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Packaging::destroy($id);
		return redirect('packaging');
	}

}
