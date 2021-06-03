@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.posts.create')}}">Nuevo post</a>
    <h1>Lista de posts</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop


