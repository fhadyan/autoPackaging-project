@extends('layouts.master')

@section('content')

    <h1>Letter</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Date</th><th>Note</th><th>Order Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $letter->id }}</td> <td> {{ $letter->date }} </td><td> {{ $letter->note }} </td><td> {{ $letter->order_id }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection