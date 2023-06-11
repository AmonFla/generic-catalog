@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
  <h1>Imágenes</h1>
@stop

@section('content')
  {{-- Minimal without header / body only --}}
  <x-adminlte-card theme="info" theme-mode="outline" title="Cargar una imagen" enctype="multipart/form-data">
    <form action="{{ route('img.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <x-adminlte-input name="name" label="Nombre" placeholder="Nombre" fgroup-class="col-md-6" />
      </div>
      <div class="row">
        <x-adminlte-select name="category" label="Categoría" fgroup-class="col-md-6">
          <x-adminlte-options :options="$categories->toArray()" />
        </x-adminlte-select>
      </div>
      <div class="row">
        <x-adminlte-select name="producto" label="Tipo de producto" fgroup-class="col-md-6">
          <x-adminlte-options :options="$types->toArray()" />
        </x-adminlte-select>
      </div>
      <div class="row">
        <x-adminlte-select name="activa" label="ACtiva" fgroup-class="col-md-6">
          <x-adminlte-options :options="['true' => 'Sí', 'false' => 'No']" />
        </x-adminlte-select>
      </div>
      <div class="row">
        <x-adminlte-input name="posicion" label="Nombre" placeholder="Posición" fgroup-class="col-md-6" value='0' />
      </div>
      <div class="row">
        {{-- Placeholder, sm size and prepend icon --}}
        <x-adminlte-input-file label="Imagen" name="image" igroup-size="sm" placeholder="seleccione una imagen..."
          fgroup-class="col-md-6">
          <x-slot name="prependSlot">
            <div class="input-group-text bg-lightblue">
              <i class="fas fa-upload"></i>
            </div>
          </x-slot>
        </x-adminlte-input-file>
      </div>
      <div class="row">
        <x-adminlte-button label="Guardar" theme="primary" type="submit" />
        <a href="{{ route('img.index') }}">
          <x-adminlte-button label="Cancelar" theme="danger" />
        </a>
      </div>
    </form>
  </x-adminlte-card>
@stop
