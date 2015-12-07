@extends('layouts.master')

@section('content')

    <h1>Letters <a href="{{ url('/letter/create') }}" class="btn btn-primary pull-right btn-sm">Add New Letter</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL.</th><th>Date</th><th>Note</th><th>Order Id</th><th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($letters as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/letter', $item->id) }}">{{ $item->date }}</a></td><td>{{ $item->note }}</td><td>{{ $item->order_id }}</td>
                    <td><a href="{{ url('/letter/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> / {!! Form::open(['method'=>'delete','action'=>['LetterController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection