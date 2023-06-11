@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
  <h1>Usuarios</h1>
@stop

@section('content')
  {{-- Minimal without header / body only --}}
  <x-adminlte-card theme="info" theme-mode="outline" title="Listado de usuarios">
    <x-slot name="toolsSlot">
      <a href="{{ route('users.create') }}">
        <x-adminlte-button label="Nuevo" theme="primary" icon="fas fa-plus" />
      </a>
    </x-slot>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Usuario</th>
          <th>eMail</th>
          <th>Type</th>
          <th>Actions</th>
        </tr>
      </thead>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->user_type }}</td>
          <td>
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
              <a href="{{ route('users.edit', $user->id) }}">
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
