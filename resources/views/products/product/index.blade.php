@extends('layouts.master')

@section('content')

    <h1>Products <a href="{{ url('/product/create') }}" class="btn btn-primary pull-right btn-sm">Add New Product</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Weight</th>
                    <th>Length</th>
                    <th>Widht</th>
                    <th>Height</th>
                    <th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($products as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/product', $item->id) }}">{{ $item->product_name }}</a></td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->length }}</td>
                    <td>{{ $item->widht }}</td>
                    <td>{{ $item->height }}</td>
                    <td><a href="{{ url('/product/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> / {!! Form::open(['method'=>'delete','action'=>['ProductController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection