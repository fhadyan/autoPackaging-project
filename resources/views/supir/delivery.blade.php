@extends('layouts.master')

@section('content')

	<h1>Pengantaran</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Nama Supir</th>
                    <th>Nama Konsumer</th>
                    <th>No hp Konsumer</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($letters as $item)
                {{-- */$x++;/* --}}
                {{-- */$supir = $item->supir()->get()->first()/* --}}
                {{-- */$consumer = $item->order()->get()->first()->consumer()->get()->first()/* --}}
                <tr>
                	<td>{{ $x }}</td>
                	<td>{{ $supir->name }}</td>
                	<td>{{ $consumer->name }}</td>
                	<td>{{ $consumer->nohp }}</td>
                	<td>{{ $consumer->address }}</td>
                	<td>{{ $item->date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection