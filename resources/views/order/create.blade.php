@extends('layouts.master')

@section('content')

    <h1>Create New Order</h1>
    @if(Session::has('product'))
        {{ Session::get('product') }}
    @else
        ok-no
    @endif
    <hr/>

    {!! Form::open(['url' => 'order', 'class' => 'form-horizontal']) !!}
    
    <div class="form-group">
                        {!! Form::label('consumer', 'Konsumer Lama: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <input type="radio" class="new-customer-radio" name="consumer" value="yes" checked="checked"> Iya <br><input class="old-customer-radio" type="radio" name="consumer" value="no"> Tidak
                        </div>
                    </div><div class="form-group old-customer">
                        {!! Form::label('consumer_id', 'Consumer Id: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('consumer_id', $consumers, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="new-customer">
                        <div class="form-group">
                            {!! Form::label('consumer_id', 'Data Konsumer ', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div><div class="form-group">
                                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                </div>
                            </div><div class="form-group">
                                {!! Form::label('address', 'Address: ', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
                                </div>
                            </div><div class="form-group">
                                {!! Form::label('nohp', 'Nohp: ', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::number('nohp', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                    </div>
                    <div class="product">
                        <div class="form-group">
                            {!! Form::label('ordered_product', 'Produk pesanan', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::select('product', $products, null, ['class' => 'form-control product-id']) !!}
                            </div>
                            <div class="col-sm-1">
                                <input type="text" name="amount" class="form-control amount">
                            </div>
                            <div class="col-sm-1">
                                <button type="button" style="" class="btn btn-primary form-control add-product">+</button>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('total', 'Total harga:', ['class' => 'col-sm-3 control-label']) !!}
                            <div style="vertical-alignmetn:center" class="col-sm-6 total-price">
                                <p class="price">0</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <table class="table">
                                    <thead>
                                        <th>nama produk</th>
                                        <th>harga</th>
                                    </thead>
                                    <tbody id="product-table" class="product-table">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::hidden('user_id', Auth::user()->id) !!}
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