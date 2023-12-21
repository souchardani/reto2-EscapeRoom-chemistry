@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 2 - Editar')
@section('content')

<!-- Displays this message if the previous modification was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<form action="{{route('admin.game2storeEdit', $game2->id)}}" method="post"  enctype="multipart/form-data">
    @csrf
    @method('put')

    <label for="compound">Compuesto</label>
    <input type="text" name="compound" id="compound" value="{{$game2->compound}}"><br>
    @if ($errors->has('compound'))
        <span>El campo compuesto es obligatorio</span><br>
    @endif

    <label for="category">Categoría</label>
    <select name="category" id="category"  >
        <option value=""></option>
        <option value="ANÁLISIS" @if ($game2->category == "ANÁLISIS") {{'selected'}} @endif>ANÁLISIS</option>
        <option value="MICROBIOLOGÍA" @if ($game2->category == "MICROBIOLOGÍA") {{'selected'}} @endif>MICROBIOLOGÍA</option>
        <option value="MEDIDA" @if ($game2->category == "MEDIDA") {{'selected'}} @endif>MEDIDA</option>
        <option value="BIOTECNOLOGÍA" @if ($game2->category == "BIOTECNOLOGÍA") {{'selected'}} @endif>BIOTECNOLOGÍA</option>
    </select>
    @if ($errors->has('category'))
        <span>El campo categoría es obligatorio</span><br>
    @endif


    <br><br><br>
    <input type="submit" value="Guardar cambios">
    <a href="{{route('admin.game2')}}">Cancelar</a>
</form>

@endsection
