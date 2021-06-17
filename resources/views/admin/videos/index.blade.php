@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.videos.create')}}">Nuevo video</a>
    <h1>Lista de videos</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @livewire('admin.videos-index')
@stop

