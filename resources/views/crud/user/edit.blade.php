@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
  <h1>Usuarios</h1>
@stop

@section('content')
  {{-- Minimal without header / body only --}}
  <x-adminlte-card theme="info" theme-mode="outline" title="Editar un usuario" enctype="multipart/form-data">
    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <x-adminlte-input name="name" label="Nombre" value="{{ $user->name }}" placeholder="Nombre"
          fgroup-class="col-md-6" />
      </div>
      <div class="row">
        <x-adminlte-input name="email" label="eMail" value="{{ $user->email }}" placeholder="Correo Electrónico"
          fgroup-class="col-md-6" />
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="exampleInputPassword1">Contraseña</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
      </div>
      <div class="row">
        <x-adminlte-select name="user_type" label="Tipo de usuario" fgroup-class="col-md-6">
          <x-adminlte-options :options="App\Enums\UserType::values()" selected="$user->user_type" />
        </x-adminlte-select>
      </div>
      <div class="row">
        <x-adminlte-button label="Guardar" theme="primary" type="submit" />
        <a href="{{ route('users.index') }}">
          <x-adminlte-button label="Cancelar" theme="danger" />
        </a>
      </div>
    </form>
  </x-adminlte-card>
@stop
