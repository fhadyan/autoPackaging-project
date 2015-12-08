@extends('layouts.master')

@section('content')

    <h1>Orders <a href="{{ url('/order/create') }}" class="btn btn-primary pull-right btn-sm">Add New Order</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL.</th><th>Date</th><th>User Id</th><th>Consumer Id</th><th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($orders as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/order', $item->id) }}">{{ $item->date }}</a></td>
                    <td>{{ $item->user()->get()->first()->name }}</td>
                    <td>{{ $item->consumer()->get()->first()->name }}</td>
                    <td><a href="{{ url('/order/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> / {!! Form::open(['method'=>'delete','action'=>['OrderController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection