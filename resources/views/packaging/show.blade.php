@extends('layouts.master')

@section('content')

    <h1>Packaging</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>No Do</th><th>No Contract</th><th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $packaging->id }}</td> <td> {{ $packaging->no_do }} </td><td> {{ $packaging->no_contract }} </td><td> {{ $packaging->invoice }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection