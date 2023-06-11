@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
  <h1>Tipos de productos</h1>
@stop

@section('content')
  {{-- Minimal without header / body only --}}
  <x-adminlte-card theme="info" theme-mode="outline" title="Editar un tipo" enctype="multipart/form-data">
    <form action="{{ route('types.update', $type->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <x-adminlte-input name="name" label="Nombre" value="{{ $type->name }}" placeholder="Nombre"
          fgroup-class="col-md-6" />
      </div>
      <div class="row">
        <x-adminlte-button label="Guardar" theme="primary" type="submit" />
        <a href="{{ route('types.index') }}">
          <x-adminlte-button label="Cancelar" theme="danger" />
        </a>
      </div>
    </form>
  </x-adminlte-card>
@stop
