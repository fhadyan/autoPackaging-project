@extends('layouts.master')

@section('content')

    <h1>Supir</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Address</th><th>Nohp</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $supir->id }}</td> <td> {{ $supir->name }} </td><td> {{ $supir->address }} </td><td> {{ $supir->nohp }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection