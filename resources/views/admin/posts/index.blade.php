@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.posts.create')}}">Nuevo post</a>
    <h1>Lista de posts</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @livewire('admin.posts-index')
@stop


