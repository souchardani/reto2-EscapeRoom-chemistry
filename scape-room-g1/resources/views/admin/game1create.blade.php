@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 1 - Nuevo')
@section('content')

<form action="{{route('admin.game1storeNew')}}" method="post"  enctype="multipart/form-data">
    @csrf

    <label for="molecule">Molecula</label>
    <input type="text" name="molecule" id="molecule" required><br>
    <label for="img_molecule">Foto Molecula</label>
    <input name="img_molecule" id="img_molecule" type="file" required><br>

    <br><br><br>
    <input type="submit" value="Crear">
    <a href="{{route('admin.game1')}}">Cancelar</a>
</form>

@endsection
