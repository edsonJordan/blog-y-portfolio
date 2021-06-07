@extends('adminlte::page')
@section('title', 'Edson Dev')
@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.technologies.create')}}">Nueva Tecnologia</a>
    <h1>Lista de Tecnologias</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
    @livewire('admin.technology-index')
@stop

