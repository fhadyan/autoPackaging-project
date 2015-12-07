@extends('layouts.master')

@section('content')

    <h1>Packagings <a href="{{ url('/packaging/create') }}" class="btn btn-primary pull-right btn-sm">Add New Packaging</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL.</th><th>No Do</th><th>No Contract</th><th>Invoice</th><th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($packagings as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/packaging', $item->id) }}">{{ $item->no_do }}</a></td><td>{{ $item->no_contract }}</td><td>{{ $item->invoice }}</td>
                    <td><a href="{{ url('/packaging/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> / {!! Form::open(['method'=>'delete','action'=>['PackagingController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection