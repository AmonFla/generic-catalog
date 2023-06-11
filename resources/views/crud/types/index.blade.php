@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
  <h1>Tipos de productos</h1>
@stop

@section('content')
  {{-- Minimal without header / body only --}}
  <x-adminlte-card theme="info" theme-mode="outline" title="Listado de tipos">
    <x-slot name="toolsSlot">
      <a href="{{ route('types.create') }}">
        <x-adminlte-button label="Nuevo" theme="primary" icon="fas fa-plus" />
      </a>
    </x-slot>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Actions</th>
        </tr>
      </thead>
      @foreach ($types as $type)
        <tr>
          <td>{{ $type->id }}</td>
          <td>{{ $type->name }}</td>
          <td>
            <form action="{{ route('types.destroy', $type->id) }}" method="post">
              <a href="{{ route('types.edit', $type->id) }}">
                <x-adminlte-button label="" theme="primary" icon="fas fa-edit" />
              </a>
              @csrf
              @method('DELETE')
              <x-adminlte-button onclick="return confirm('{{ __('Seguro??') }}');" label="" theme="danger"
                icon="fas fa-trash" type="submit" />

            </form>

            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </x-adminlte-card>
@stop
