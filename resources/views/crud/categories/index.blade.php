@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
  <h1>Categorias</h1>
@stop

@section('content')
  {{-- Minimal without header / body only --}}
  <x-adminlte-card theme="info" theme-mode="outline" title="Listado de categorias">
    <x-slot name="toolsSlot">
      <a href="{{ route('categories.create') }}">
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
      @foreach ($categories as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
          <td>
            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
              <a href="{{ route('categories.edit', $category->id) }}">
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
