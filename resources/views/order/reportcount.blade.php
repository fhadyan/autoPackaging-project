@extends('layouts.master')

@section('content')

	@foreach($products as $product)
	{{ $product->product_name }}
	@endforeach

@endsection