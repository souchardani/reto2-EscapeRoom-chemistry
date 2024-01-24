@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 3 - Editar')
@section('content')

<!-- Displays this message if the previous creation was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<form action="{{route('admin.game3storeEdit', $game3->id)}}" method="post"  enctype="multipart/form-data">
    @csrf
    @method('put')

    <label for="word">Palabra</label>
    <input type="text" name="word" id="word" value="{{$game3->word}}"><br>
    @if ($errors->has('word'))
        <span>El campo palabra es obligatorio</span><br>
    @endif

    <br><br><br>
    <input type="submit" value="Guardar cambios">
    <a href="{{route('admin.game3')}}">Cancelar</a>
</form>

@endsection