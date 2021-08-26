@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/estilos.css') }}" rel="stylesheet">
    <div style="position: relative; top: 40%; left:35%">
        <h1 style="color:white; font-size: 32px">Bienvenido {{Auth::user()->nombre}}</div>
    </div>
@endsection