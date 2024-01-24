@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 4 - Editar')
@section('content')

<!-- Displays this message if the previous modification was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<form action="{{route('admin.game4storeEdit', $game4->id)}}" method="post"  enctype="multipart/form-data">
    @csrf
    @method('put')

    <label for="growth">Medio cultivo</label>
    <input type="text" name="growth" id="growth" value="{{$game4->growth}}"><br>
    @if ($errors->has('growth'))
        <span>El campo medio cultivo es obligatorio</span><br>
    @endif

    <label for="caracteristics">Características</label>
    <input type="text" name="caracteristics" id="caracteristics" value="{{$game4->caracteristics}}"><br>
    @if ($errors->has('caracteristics'))
        <span>El campo características es obligatorio</span><br>
    @endif


    <br><br><br>
    <input type="submit" value="Guardar cambios">
    <a href="{{route('admin.game4')}}">Cancelar</a>
</form>

@endsection