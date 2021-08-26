@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/estilos.css') }}" rel="stylesheet">
<h3 class="text-center" style="color:white"><b>Lista De Hoteles</b></h3>
    <br>>
    @if( count($lista)>0)
        <div class="row bordes titulo" style="text-align:center;">
            <div class="col-2">
                <h5><b>Nombre</b></h5>
            </div>
            <div class="col-3 ">
                <h5><b>Descripción</b></h5>
            </div>
            <div class="col-2 ">
                <h5><b>Cantidad habitaciones</b></h5>
            </div>
            <div class="col-4 ">
                <h5><b>Dirección</b></h5>
            </div> 
            <div class="col-1">
                <h5><b>Precio</b></h5>
            </div>        
        </div>
        @foreach ($lista as $hotel)
        <div class="row titu" style="text-align:center;">
            <div class="col-2 filas">
                <p class="tbr"> {{$hotel->nombre}} </p>
            </div>
            <div class="col-3 filas">
                <p class="tbr"> {{$hotel->descripcion}} </p>
            </div>
            <div class="col-2 filas">
                <p class="tbr"> {{$hotel->cant_habitaciones}} </p>
            </div>
            <div class="col-4 filas">
                <p class="tbr"> {{$hotel->direccion}} </p>
            </div> 
            <div class="col-1 filas">
                <p class="tbr">$ {{$hotel->precio}} </p>
            </div>        
        </div>
        @endforeach
    @else
        <p style="text-align:center;">No existen registros de hoteles</p>
    @endif
@endsection