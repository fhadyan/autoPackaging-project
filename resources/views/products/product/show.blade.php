@extends('layouts.master')

@section('content')

    <h1>Product</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Product Name</th><th>Weight</th><th>Length</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $product->id }}</td> <td> {{ $product->product_name }} </td><td> {{ $product->weight }} </td><td> {{ $product->length }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection