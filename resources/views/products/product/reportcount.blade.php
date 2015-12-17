@extends('layouts.master')

@section('content')

	
	{{-- */$total=0;/* --}}
	@foreach($products as $product)
    	{{-- */$total+=$product->count;/* --}}
    @endforeach

	<h1>Laporan Produk {{ $year }}</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Jumlah penjualan</th>
                    <th>Persentase</th>
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
                    	{{ $product->count }}
                    </td>
                    <td>
                    	{{ $product->count/$total*100 }}%
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection