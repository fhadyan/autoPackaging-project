@extends('layouts.master')

@section('content')

    <h1>Box</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Width</th><th>Length</th><th>Height</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $box->id }}</td> <td> {{ $box->width }} </td><td> {{ $box->length }} </td><td> {{ $box->height }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection