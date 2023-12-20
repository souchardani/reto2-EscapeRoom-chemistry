@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 1 - Eliminar')
@section('content')

<h2>Estas a punto de borrar de forma permanente el siguiente registro.</h2><br>

<table>
    <tr>
        <th>Molecula</th>
        <th>Foto Molecula</th>
    </tr>
    <tr>
        <td>{{ $game1->molecule }}</td>
        <td><img src="/img/game1_puzzles_img/{{ $game1->img_molecule }}" alt="{{ $game1->img_molecule }}"></td>
    </tr>
</table>
<br><br><br>
<td><form action="{{route('admin.game1destroyConfirm', $game1->id)}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="Eliminar">
    <a href="{{route('admin.game1')}}">Cancelar</a>
</form></td>

@endsection
