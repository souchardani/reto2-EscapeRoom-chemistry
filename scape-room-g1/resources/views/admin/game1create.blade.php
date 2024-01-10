@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 1 - Nuevo')
@section('content')

<!-- Displays this message if the previous creation was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<form action="{{route('admin.game1storeNew')}}" method="post"  enctype="multipart/form-data">
    @csrf

    <label for="molecule">Molecula</label>
    <input type="text" name="molecule" id="molecule" value="{{old('molecule')}}"><br>
    @if ($errors->has('molecule'))
        <span>El campo molecula es obligatorio</span><br>
    @endif

    <label for="img_molecule">Foto Molecula</label>
    <input name="img_molecule" id="img_molecule" type="file" /><br>
    @if ($errors->has('img_molecule'))
        <span>El campo foto molecula es obligatorio</span><br>
    @endif

    <br><br><br>
    <input type="submit" value="Crear">
    <a href="{{route('admin.game1')}}">Cancelar</a>
</form>

@endsection
