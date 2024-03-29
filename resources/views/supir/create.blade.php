@extends('layouts.master')

@section('content')

    <h1>Create New Supir</h1>
    <hr/>

    {!! Form::open(['url' => 'supir', 'class' => 'form-horizontal']) !!}
    
    <div class="form-group">
                        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
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