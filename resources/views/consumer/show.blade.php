@extends('layouts.master')

@section('content')

    <h1>Consumer</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Email</th><th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $consumer->id }}</td> <td> {{ $consumer->name }} </td><td> {{ $consumer->email }} </td><td> {{ $consumer->address }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection