<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Order;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
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
		$products = Product::latest()->get();
		return view('products.product.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('products.product.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, ['product_name' => 'required|unique:products|min:4|max:16',
								   'weight' => 'required',
								   'length' => 'required',
								   'widht' => 'required',
								   'height' => 'required',
								   'price' => 'required']); // Uncomment and modify if you need to validate any input.
		Product::create($request->all());
		return redirect('product');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		return view('products.product.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		return view('products.product.edit', compact('product'));
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
		$this->validate($request, ['product_name' => 'required|min:4|max:16',
								   'weight' => 'required',
								   'length' => 'required',
								   'widht' => 'required',
								   'height' => 'required',
								   'price' => 'required']);
		$product = Product::findOrFail($id);
		$product->update($request->all());
		return redirect('product');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::destroy($id);
		return redirect('product');
	}

	public function reportCount($year)
	{
		//echo $year;
		//echo "ok";
		//$orders = Order::select(DB::raw('date, user_id, consumer_id'))->whereRaw('substr(date,1,4)='.$year)->get();
		$products = DB::select('select product_name, product_code ,sum(amount) as count from orders join order_product on(orders.id=order_id) join products on(products.id=product_id) where substr(date,1,4)='.$year.' group by product_id;');
		//$orders = Order::select(DB::raw('substr(date,1,4) as year'))->where(DB::raw('substr(date,1,4)='.$year))->getQuery()->toSql();
		//echo $products[0]->count;
		// foreach ($products as $product) {
		// 	echo $product->product_name.' - '.$product->count.'<br>';
		// }

		return view('products/product/reportcount',compact('products'))->with(compact('year'));
	}

	public function reportSum($year)
	{
		//echo $year;
		//echo "ok";
		//$orders = Order::select(DB::raw('date, user_id, consumer_id'))->whereRaw('substr(date,1,4)='.$year)->get();
		$products = DB::select('select product_name, product_code, price ,sum(amount) as count, sum(price) as profit from orders join order_product on(orders.id=order_id) join products on(products.id=product_id) where substr(date,1,4)='.$year.' group by product_id;');
		//$orders = Order::select(DB::raw('substr(date,1,4) as year'))->where(DB::raw('substr(date,1,4)='.$year))->getQuery()->toSql();
		//echo $products[0]->count;
		// foreach ($products as $product) {
		// 	echo $product->product_name.' - '.$product->count.'<br>';
		// }

		return view('products/product/reportsum',compact('products'))->with(compact('year'));
	}

}


