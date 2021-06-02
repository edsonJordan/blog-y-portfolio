@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <h1>Lista de posts</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop


