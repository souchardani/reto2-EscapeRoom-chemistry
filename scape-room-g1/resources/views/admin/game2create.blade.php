@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 2 - Nuevo')
@section('content')

<!-- Displays this message if the previous creation was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<form action="{{route('admin.game2storeNew')}}" method="post">
    @csrf

    <label for="compound">Compuesto</label>
    <input type="text" name="compound" id="compound" value="{{old('compound')}}"><br>
    @if ($errors->has('compound'))
        <span>El campo compuesto es obligatorio</span><br>
    @endif

    <label for="category">Categoría</label>
    <select name="category" id="category">
        <option value=""></option>
        <option value="ANÁLISIS">ANÁLISIS</option>
        <option value="MICROBIOLOGÍA">MICROBIOLOGÍA</option>
        <option value="MEDIDA">MEDIDA</option>
        <option value="BIOTECNOLOGÍA">BIOTECNOLOGÍA</option>
    </select>
    @if ($errors->has('category'))
        <span>El campo categoría es obligatorio</span><br>
    @endif

    <br><br><br>
    <input type="submit" value="Crear">
    <a href="{{route('admin.game2')}}">Cancelar</a>
</form>

@endsection
