@extends('layouts.master')

@section('content')

    <div class="table-responsive">
        <h3>Packaging <a href="{{ url('/packaging/print/'.$packaging->id) }}" class="btn btn-primary pull-right btn-sm">Print</a></h3> 
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th>
                    <th>No Packaging</th>
                    <th>No Do</th>
                    <th>No Contract</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $packaging->id }}</td>
                    <td> {{ $packaging->no_packaging }} </td>
                    <td> {{ $packaging->no_do }} </td>
                    <td> {{ $packaging->no_contract }} </td>
                    <td> {{ $packaging->invoice }} </td>
                </tr>
            </tbody>    
        </table>
        <h3>Surat Pengantar</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th>
                    <th>Nama</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th>Order Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $letter->id }}</td>
                    <td>{{ $consumer->name }}</td>
                    <td> {{ $letter->date }} </td>
                    <td> {{ $letter->note }} </td>
                    <td> {{ $letter->order_id }} </td>
                </tr>
            </tbody>    
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Produk</h3>
                            {!! Form::open(['url' => 'koli/attachProduct', 'class' => 'form-inline']) !!}
                            <label class="control-label col-sm-2">Produk : </label>
                            <div class="col-sm-2">
                                <select name="product_id" class="form-control">
                                    @foreach($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="control-label col-sm-2">Koli : </label>
                            <div class="col-sm-2">
                                <select name="koli_id" class="form-control">
                                    @foreach($kolis as $item)
                                    <option value="{{ $item->id }}">{{ $item->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" style="" class="btn btn-primary form-control">+</button>
                            </div>
                            {!! Form::hidden('packaging_id', $packaging->id) !!}
                            {!! Form::close() !!} 
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Koli</th>
                    </tr>
                </thead>                
                <tbody>
                {{-- */$x=0;/* --}}
                @foreach($products as $item)
                    {{-- */$x++;/* --}}
                    <tr>
                        <td>{{ $x }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->pivot->amount}}</td>
                        <td>
                            @if($item->kolis()->get()->where('packaging_id',$packaging->id)->first()!=null)
                            {{ $item->kolis()->get()->where('packaging_id',$packaging->id)->first()->id }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Koli</h3>
            <div class="row">
                            {!! Form::open(['url' => 'koli', 'class' => 'form-horizontal']) !!}
                            <div class="col-sm-4">
                                <select name="box_id" class="form-control">
                                    @foreach($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->width }} x {{ $box->length }} x {{ $box->height }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" style="" class="btn btn-primary form-control">+</button>
                            </div>
                            {!! Form::hidden('packaging_id', $packaging->id) !!}
                            {!! Form::close() !!}               
            </div>
            <div class="row">
                <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lebar</th>
                        <th>Panjang</th>
                        <th>Tinggi</th>
                        <th>Action</th>
                    </tr>
                </thead>                
                <tbody>
                {{-- */$x=0;/* --}}
                @foreach($kolis as $item)
                    {{-- */$x++;/* --}}
                    {{-- */$boxs = $item->box()->get()->first()/* --}}
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $boxs->width }}</td>
                        <td>{{ $boxs->length }}</td>
                        <td>{{ $boxs->height }}</td>
                        <td>{!! Form::open(['method'=>'delete','action'=>['KoliController@destroy',$item->id], 'style' => 'display:inline']) !!} {{ csrf_field() }}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>   
            </div>
        </div>
    </div>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection