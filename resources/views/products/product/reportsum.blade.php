@extends('layouts.master')

@section('content')

	
	{{-- */$profit=0;/* --}}
    {{-- */$total=0;/* --}}
    {{-- */$maxProfitProduct;/* --}}
    {{-- */$maxProfit=0;/* --}}
    {{-- */$minProfitProduct;/* --}}
    {{-- */$minProfit=9999999;/* --}}

    {{-- */$maxCountProduct;/* --}}
    {{-- */$maxCount=0;/* --}}
    {{-- */$minCountProduct;/* --}}
    {{-- */$minCount=9999999;/* --}}
	@foreach($products as $product)
    	{{-- */$profit+=$product->profit;/* --}}
        @if($maxProfit<=$product->profit)   
        {{-- */$maxProfit=$product->profit;/* --}}
        {{-- */$maxProfitProduct=$product->product_name;/* --}}
        @endif

        @if($minProfit>=$product->profit)
        {{-- */$minProfit=$product->profit;/* --}}   
        {{-- */$minProfitProduct=$product->product_name;/* --}}
        @endif

        {{-- */$total+=$product->count;/* --}}
        @if($maxCount<=$product->count)   
        {{-- */$maxCount=$product->count;/* --}}
        {{-- */$maxCountProduct=$product->product_name;/* --}}
        @endif

        @if($minCount>=$product->count)
        {{-- */$minCount=$product->count;/* --}}   
        {{-- */$minCountProduct=$product->product_name;/* --}}
        @endif
    @endforeach

	<h1>Laporan Produk {{ $year }}</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Keuntungan Produk</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($products as $product)
                {{-- */$x++;/* --}}
                <tr>
                    <td>
                        {{ $x }}
                    </td>
                    <td>
                        {{ $product->product_code }}
                    </td>
                    <td>
                        {{ $product->product_name }}
                    </td>
                    <td>
                        {{ $product->profit }}
                </tr>
            @endforeach
            </tbody>
    
        </table>
    </div>

    <div class="row">
        <div class="col-md-3">Total Keuntungan Kotor</div>
        <div class="col-xs-1"> : </div>
        <div class="col-md-3">{{ $profit }}</div>
    </div>
    <div class="row">
        <div class="col-md-3">Produk keuntungan tertinggi</div>
        <div class="col-xs-1"> : </div>
        <div class="col-md-3">{{ $maxProfitProduct }}</div>
    </div>
    <div class="row">
        <div class="col-md-3">Produk keuntungan terrendah</div>
        <div class="col-xs-1"> : </div>
        <div class="col-md-3">{{ $minProfitProduct }}</div>
    </div>

    <div class="row">
        <div class="col-md-3">Total Jumlah Penjuallan</div>
        <div class="col-xs-1"> : </div>
        <div class="col-md-3">{{ $total }}</div>
    </div>
    <div class="row">
        <div class="col-md-3">Produk Penualan tertinggi</div>
        <div class="col-xs-1"> : </div>
        <div class="col-md-3">{{ $maxCountProduct }}</div>
    </div>
    <div class="row">
        <div class="col-md-3">Produk Penjualan terendah</div>
        <div class="col-xs-1"> : </div>
        <div class="col-md-3">{{ $minCountProduct }}</div>
    <div>

@endsection