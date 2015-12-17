@extends('layouts.master')

@section('content')

    <h1>Edit Packaging</h1>
    <hr/>

    {!! Form::model($packaging, ['method' => 'PATCH', 'action' => ['PackagingController@update', $packaging->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
                        {!! Form::label('no_do', 'No Do: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('no_do', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('no_contract', 'No Contract: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('no_contract', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('invoice', 'Invoice: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('invoice', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('invoice_date', 'Invoice Date: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::date('invoice_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                     <h2>Buat surat pengantar</h2>
    <hr/>
                    <div class="form-group">
                        {!! Form::label('no_letter', 'No Surat Pengantar: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('no_letter', $letter->no_letter, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('date', 'Tanggal: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::date('date', $letter->date, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('note', 'catatan: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::textarea('note', $letter->note, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('order_id', 'Id Pemesanan: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <select class="form-control" name="order_id">
                                @foreach($orders as $order)
                                    @if($order->id == $letter->order_id)
                                    <option value="{{ $order->id }}" selected>{{ $order->id }} - {{ $order->consumer()->get()->first()->name }} - {{ $order->date }}</option>
                                    @else
                                    <option value="{{ $order->id }}">{{ $order->id }} - {{ $order->consumer()->get()->first()->name }} - {{ $order->date }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('supir_id', 'Supir Id: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('supir_id', $supirs, $letter->supir_id, ['class' => 'form-control']) !!}
                        </div>
                    </div>
    
                   
    
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection