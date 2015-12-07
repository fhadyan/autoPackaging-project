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
                    <td>{{ $order->id }}</td> <td> {{ $order->date }} </td><td> {{ $order->user_id }} </td><td> {{ $order->consumer_id }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection