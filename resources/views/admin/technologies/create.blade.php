@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario de creación de tecnologia</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">

            {!! Form::open(['route' => 'admin.technologies.store', 'autocomplete' => 'off', 'files' => true]) !!}
            
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la categoria', 'readonly']) !!}
                
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('color','Color') !!}
                {!! Form::select('color', $colors, null, ['class' => ['form-control'] ]) !!}
            <hr>
            @error('color')
                <small class="text-danger" >{{$message}}</small>
            @enderror
            </div>  
            {!! Form::submit('Crear Tecnologia', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">

        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}" ></script>


    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });


       
    </script>


@endsection