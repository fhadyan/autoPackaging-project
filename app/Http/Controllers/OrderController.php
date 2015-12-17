<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use App\Consumer;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
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
		$orders = Order::latest()->get();
		return view('order.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$request->session()->forget('product');
		$consumers = Consumer::lists('name','id');
		$products = Product::lists('product_name','id');
		return view('order.create', compact('consumers'))->with(compact('products'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if($request->consumer=="yes"){
			//$this->validate($request, ['date' => 'required',]);	
			//$order = Order::create($request->all());
			$order = new Order($request->all());
			$order->date = date("Y-m-d");
			$order->save();
		}else{
			$this->validate($request, ['name' => 'required|min:4|max:32|unique:consumers',
								   'email' => 'required|email|unique:consumers',
								   'nohp' => 'required',
								   'address' => 'required']);
			$consumer = Consumer::create($request->all());
			$order = new Order($request->all());
			$order->consumer_id = $consumer->id;
			$order->date = date("Y-m-d");
			$order->save();
		}

		$products = explode("-", $request->session()->get('product', 'default'));
		echo $request->session()->get('product', 'default');
		foreach ($products as $product) {
			$productData = explode("#", $product);
			$order->products()->attach($productData[0], array("amount"=>$productData[1]));
		}
		
		//Order::create($request->all());
		return redirect('order');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);
		$products = $order->products()->withPivot('amount')->get();
		return view('order.show', compact('order'))->with(compact('products'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::findOrFail($id);
		$consumers = Consumer::lists('name','id');
		return view('order.edit', compact('order'))->with(compact('consumers'));
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
		$order = Order::findOrFail($id);
		$order->update($request->all());
		return redirect('order');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Order::destroy($id);
		return redirect('order');
	}

	public function addProduct(Request $request, $id, $amount)
	{
		if ($request->session()->has('product')) {
			$data = $request->session()->get('product', 'default');
			$data .="-".$id."#".$amount;
			$request->session()->put('product', $data);
		}else{
			$data =$id."#".$amount;
			$request->session()->put('product', $data);
		}
		$product=Product::findOrFail($id);
		$text = $product->product_name; 
		$text .= "-";
		$text .= $product->price;
		return $text;
	}

}
