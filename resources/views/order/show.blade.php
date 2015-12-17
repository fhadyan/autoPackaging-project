@extends('layouts.master')

@section('content')

    <h1>Order</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Date</th><th>User Id</th><th>Consumer Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->id }}</td>
                    <td> {{ $order->date }} </td>
                    <td>{{ $order->user()->get()->first()->name }}</td>
                    <td>{{ $order->consumer()->get()->first()->name }}</td>
                </tr>
        </table>
        <table class="table">
            <thead>
                <th>nama produk</th>
                <th>harga</th>
                <th>jumlah</th>
                <th>total</th>
            </thead>
            <tbody id="product-table" class="product-table">
                @foreach($products as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->pivot->amount }}</td>
                    <td>{{ $item->pivot->amount*$item->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

