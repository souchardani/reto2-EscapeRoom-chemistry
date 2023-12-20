@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 1 - Editar')
@section('content')

<form action="{{route('admin.game1storeEdit', $game1->id, $game1->old_imgName)}}" method="post"  enctype="multipart/form-data">
    @csrf
    @method('put')

    <label for="molecule">Molecula</label>
    <input type="text" name="molecule" id="molecule" required value="{{ $game1->molecule }}"><br>
    <label for="img_molecule">Foto Molecula</label>
    <img src="/img/game1_puzzles_img/{{ $game1->img_molecule }}" alt="{{ $game1->img_molecule }}"><br>
    <input type="hidden" name="old_imgName" id="old_imgName" value="{{ $game1->img_molecule }}">
    <input name="img_molecule" id="img_molecule" type="file" />

    <br><br><br>
    <input type="submit" value="Guardar cambios">
    <a href="{{route('admin.game1')}}">Cancelar</a>
</form>

@endsection
