@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
  <h1>Imágenes</h1>
@stop

@section('content')
  {{-- Minimal without header / body only --}}
  <x-adminlte-card theme="info" theme-mode="outline" title="Listado de imágenes">
    <x-slot name="toolsSlot">
      <a href="{{ route('img.create') }}">
        <x-adminlte-button label="Nuevo" theme="primary" icon="fas fa-plus" />
      </a>
    </x-slot>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Categoría</th>
          <th>Tipo</th>
          <th>Posición</th>
          <th>Activa</th>
          <th>Thumb</th>
          <th>Actions</th>
        </tr>
      </thead>
      @foreach ($images as $image)
        <tr>
          <td>{{ $image->id }}</td>
          <td>{{ $image->name }}</td>
          <td>{{ $image->categories->name }}</td>
          <td>{{ $image->type->name }}</td>
          <td>{{ $image->posicion }}</td>
          <td>{{ $image->activa ? 'Sí' : 'No' }}</td>
          <td>
            <a href="{{ url('img/cache/original/' . $image->image) }}" data-toggle="lightbox"
              data-title="{{ $image->name }}" data-gallery="gallery">
              <img src="{{ url('img/cache/small/' . $image->image) }}" class="img-fluid mb-2" alt="{{ $image->name }}" />
            </a>
          </td>
          <td>
            <form action="{{ route('img.destroy', $image->id) }}" method="post">
              <a href="{{ route('img.edit', $image->id) }}">
                <x-adminlte-button label="" theme="primary" icon="fas fa-edit" />
              </a>
              @csrf
              @method('DELETE')
              <x-adminlte-button onclick="return confirm('{{ __('Seguro??') }}');" label="" theme="danger"
                icon="fas fa-trash" type="submit" />

              <a href="{{ route('img.enable', $image->id) }}">
                <x-adminlte-button label="" theme="warning"
                  icon=" {{ $image->activa ? 'fas fa-eye-slash' : 'fas fa-eye' }}" />
              </a>

            </form>

            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </x-adminlte-card>
@stop

@section('js')

  <script>
    $(function() {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });
    })
  </script>
@stop
