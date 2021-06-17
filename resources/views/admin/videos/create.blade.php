@extends('adminlte::page')
    @section('title', 'Edson Dev')
    @section('content_header')
        <h1>Agregando Video de Youtube</h1>
    @stop
    
    @section('content')
        @livewire('admin.video-create')
        
    @stop
    
    @section('js')
        <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}" ></script>
    
    
        <script>
            $(document).ready( function() {
                $("#tittle").stringToSlug({
                    setEvents: 'keyup keydown blur focusin',
                    getPut: '#slug',
                    space: '-'
                });
            });
    
    
           
        </script>
    
    
    @endsection