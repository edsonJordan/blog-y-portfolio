@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Formulario de creación de post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}
            <div class="form-group">
                {!! Form::label('name', 'nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Post']) !!}
            @error('name')
                <small class="text-danger" >{{$message}}</small>
            @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del Post', 'readonly']) !!}
                
            @error('slug')
                <small class="text-danger" >{{$message}}</small>
            @enderror
            </div>
            <div class="form-group">
                {!! Form::label('category_id','Categoria') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            <hr>
            @error('category_id')
                <small class="text-danger" >{{$message}}</small>
            @enderror
            </div>
            <div class="form-group">
                 
                <p class="font-weight-blod" >Tecnologias</p>
            
                    @foreach ($techonologies as $technology)
                        <label class="mr-2" >
                        {!! Form::checkbox('techonologies[]', $technology->id, null) !!}
                        {{$technology->name}}
                        </label>
                    @endforeach    
                <hr>
            @error('techonologies')
                <small class="text-danger" >{{$message}}</small>
            @enderror
            </div>
            <div class="form-group">
                <p class="font-weight-blod" >Estado</p>
                <label for="">  
                    {!! Form::radio('status', 1, true, ['class' => 'form-control']) !!}
                    Borrador
                </label>
                <label class="ml-2" for="">  
                    {!! Form::radio('status', 2, null,['class' => 'form-control']) !!}
                    Publicado
                </label>
                <hr>
                @error('status')
                <small class="text-danger" >{{$message}}</small>
            @enderror
            </div>
            <div class="form-group">
                {!! Form::label('extract', 'Extracto:') !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
                
            @error('extract')
                <small class="text-danger" >{{$message}}</small>
            @enderror
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Cuerpo del Post:') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            
            @error('body')
                <small class="text-danger" >{{$message}}</small>
            @enderror
            </div>
            {!! Form::submit('Crear Post', ['class' => 'btn btn-success']) !!}
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">

        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}" ></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>


@endsection