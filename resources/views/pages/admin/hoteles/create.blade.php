@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/estilos.css') }}" rel="stylesheet">    
        <form method="POST" class="form-register" action="{{route('hoteles.store')}}">
        <h4 class="text-center tbr1"><b>Registra Tu Hotel</b></h4>
            <input id="formMethod" name="_method" type="hidden" value="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del hotel" autofocus pattern="[\sa-zA-ZáéíóúñÁÉÍÓÚÜüÑ]+" required>
                </div>
                <div class="form-group col-md-3">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" min="0" placeholder="Telefono del hotel"  pattern="[0-9]{10}" required>
                </div>
                <div class="form-group col-md-2">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" min="0" placeholder="Precio" required>
                </div>
                <div class="form-group col-md-3">
                <label for="cant_habitaciones">Habitaciones</label>
                <input type="number" class="form-control" id="cant_habitaciones" name="cant_habitaciones" min="0" placeholder="Cantidad de habitaciones" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del hotel" required>
                </div>
                <div class="form-group col-md-6">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección del hotel" required>
                </div>
            </div><br>
            <button type="submit" class="col-md-12 btn btn-primary buttons">Confirmar Registro</button>   
        </form>
    </div>
@endsection