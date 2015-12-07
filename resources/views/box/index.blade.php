@extends('layouts.master')

@section('content')

    <h1>Boxes <a href="{{ url('/box/create') }}" class="btn btn-primary pull-right btn-sm">Add New Box</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL.</th><th>Width</th><th>Length</th><th>Height</th><th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($boxes as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/box', $item->id) }}">{{ $item->width }}</a></td><td>{{ $item->length }}</td><td>{{ $item->height }}</td>
                    <td><a href="{{ url('/box/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> / {!! Form::open(['method'=>'delete','action'=>['BoxController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection