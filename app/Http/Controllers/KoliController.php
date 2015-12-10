<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packaging;
use App\Order;
use App\Letter;
use App\Box;
use App\Product;
use App\Koli;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['packaging_id' => 'required',
                                   'box_id' => 'required']);
        $koli = new Koli();
        $koli->box_id = $request->box_id;
        $koli->packaging_id = $request->packaging_id;
        $koli->save();
        return redirect("/packaging/".$request->packaging_id);
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
        $packaging = Koli::findOrFail($id)->packaging()->get()->first();
        Koli::destroy($id);
        return redirect('packaging/'.$packaging->id);
    }

    public function attachProduct(Request $request){
        $koli = Koli::findOrFail($request->koli_id);
        $product = Product::findOrFail($request->product_id);

        $koli->products()->attach($product->id);

        return redirect('packaging/'.$request->packaging_id);

    }
}
