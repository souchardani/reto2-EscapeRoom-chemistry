@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 4 - Eliminar')
@section('content')

    <h2>Estas a punto de borrar de forma permanente el siguiente registro.</h2><br>

    <table>
        <tr>
            <th>Medio cultivo</th>
            <th>Características</th>
        </tr>
        <tr>
            <td>{{ $game4->growth }}</td>
            <td>{{ $game4->caracteristics }}</td>
        </tr>
    </table>
    <br><br><br>
    <td>
        <form action="{{ route('admin.game4destroyConfirm', $game4->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Eliminar">
            <a href="{{ route('admin.game4') }}">Cancelar</a>
        </form>
    </td>

@endsection
