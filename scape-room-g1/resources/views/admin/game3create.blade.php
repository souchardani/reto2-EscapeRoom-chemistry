@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 3 - Nuevo')
@section('content')

<!-- Displays this message if the previous creation was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<form action="{{route('admin.game3storeNew')}}" method="post">
    @csrf

    <label for="word">Palabra</label>
    <input type="text" name="word" id="word" value="{{old('word')}}"><br>
    @if ($errors->has('word'))
        <span>El campo palabra es obligatorio</span><br>
    @endif

    <br><br><br>
    <input type="submit" value="Crear">
    <a href="{{route('admin.game3')}}">Cancelar</a>
</form>

@endsection


