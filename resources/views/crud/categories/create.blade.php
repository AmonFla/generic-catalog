@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
  <h1>Categorias</h1>
@stop

@section('content')
  {{-- Minimal without header / body only --}}
  <x-adminlte-card theme="info" theme-mode="outline" title="Crear nueva categoría" enctype="multipart/form-data">
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <x-adminlte-input name="name" label="Nombre" placeholder="Nombre" fgroup-class="col-md-6" />
      </div>
      <div class="row">
        <x-adminlte-button label="Guardar" theme="primary" type="submit" />
        <a href="{{ route('categories.index') }}">
          <x-adminlte-button label="Cancelar" theme="danger" />
        </a>
      </div>
    </form>
  </x-adminlte-card>
@stop
