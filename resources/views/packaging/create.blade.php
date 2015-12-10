@extends('layouts.master')

@section('content')

    <h2>Buat Packaging List</h2>
    <hr/>

    {!! Form::open(['url' => 'packaging', 'class' => 'form-horizontal']) !!}
    
                    <div class="form-group">
                        {!! Form::label('no_packaging', 'No Packaging: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('no_packaging', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('no_do', 'No Do: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('no_do', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('no_contract', 'No Kontrak: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('no_contract', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('invoice', 'No Faktur: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('invoice', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('invoice_date', 'Tanggal Faktur: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::date('invoice_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

    <h2>Buat surat pengantar</h2>
    <hr/>

    
                    <div class="form-group">
                        {!! Form::label('no_letter', 'No Surat Pengantar: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('no_letter', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('date', 'Tanggal: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::date('date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('note', 'catatan: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('order_id', 'Id Pemesanan: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <select class="form-control" name="order_id">
                                @foreach($orders as $order)
                                    <option value="{{ $order->id }}">{{ $order->consumer()->get()->first()->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('supir_id', 'Supir Id: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('supir_id', $supirs,null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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