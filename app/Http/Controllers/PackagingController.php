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
use Excel;

class PackagingController extends Controller
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
		$orders = Order::all();
		$supirs = Supir::lists('name','id');
		$letter = $packaging->letter()->get()->first();
		//echo $letter->no_letter;
		return view('packaging.edit', compact('packaging'), compact('letter'))->with(compact('supirs'))->with(compact('orders'));
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
		$letter=$packaging->letter()->get()->first();
		$letter->update($request->all());
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

	public function printPackaging($id)
	{
		$packaging = Packaging::findOrFail($id);
		$excel = Excel::load('resources\assets\doc\format_packaging.xlsx');
		//echo get_class($excel);
		$excel->setTitle('Packaging List - '.$packaging->no_packaging);
		$sheet = $excel->sheet('Sheet1');
		$sheet->setCellValue('D5' , $packaging->no_packaging);
		$sheet->setCellValue('D6' , $packaging->no_contract);
		$sheet->setCellValue('D7' , $packaging->invoice);
		$sheet->setCellValue('D8' , $packaging->invoice_date);
		$sheet->setCellValue('D9' , $packaging->letter()->get()->first()->no_letter);
		$order = $packaging->letter()->get()->first()->order()->get()->first();

		$kolis = $packaging->kolis()->get();
		$i=1;
		$row = 14;
		$item=0;
		$all_weight=0;
		$volume=0;
		// echo $i;
		// echo $kolis->get()->first()->products()->get()->first()->product_name;
		foreach ($kolis as $koli) {
			//echo $i;
			$sheet->setCellValue('B'.$row , $i);
			$products = $koli->products()->get();
			$start_row = $row;
			$total_weight=0;
			foreach ($products as $product) {
				$sheet->setCellValue('C'.$row , $product->product_code);
				$sheet->setCellValue('D'.$row , $product->product_name);
				$prod = $product->orders()->where('order_id', $order->id)->withPivot('amount')->get()->first();
				$sheet->setCellValue('F'.$row , $prod->pivot->amount);
				$sheet->setCellValue('G'.$row , $prod->pivot->amount);
				$row++;
				$total_weight+=$product->weight;
				$item += $product->pivot->amount;
			}
			$all_weight+=$total_weight;
			$row--;
			$box = $koli->box()->get()->first();
			$sheet->setCellValue('H'.$start_row , $box->width."cm - ".$box->length."cm - ".$box->height);
			$sheet->setCellValue('I'.$start_row , $total_weight);
			$volume+=($box->width*$box->length*$box->height);
			$row++;
			$i++;
		}
		$row++;
		$row++;
		$sheet->setCellValue('B'.$row , "Total jumlah koli : ");
		$sheet->setCellValue('C'.$row , $i-1);
		$sheet->setCellValue('E'.$row , "Total item : ");
		$sheet->setCellValue('F'.$row , $row-14+1);
		$sheet->setCellValue('H'.$row , "Total Pcs : ");
		$sheet->setCellValue('I'.$row , $item);

		$row++;

		$sheet->setCellValue('B'.$row , "Total berat kotor : ");
		$sheet->setCellValue('C'.$row , $all_weight);
		$sheet->setCellValue('E'.$row , "Total berat bersih : ");
		$sheet->setCellValue('F'.$row , 0);
		$sheet->setCellValue('H'.$row , "Total volume : ");
		$sheet->setCellValue('I'.$row , ($volume/100)."m3");		

		//echo $i;
		$excel->download('xlsx');
	}
}
