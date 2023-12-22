@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 2 - Eliminar')
@section('content')

    <h2>Estas a punto de borrar de forma permanente el siguiente registro.</h2><br>

    <table>
        <tr>
            <th>Compuesto</th>
            <th>Categoría</th>
        </tr>
        <tr>
            <td>{{ $game2->compound }}</td>
            <td>{{ $game2->category }}</td>
        </tr>
    </table>
    <br><br><br>
    <td>
        <form action="{{ route('admin.game2destroyConfirm', $game2->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Eliminar">
            <a href="{{ route('admin.game2') }}">Cancelar</a>
        </form>
    </td>

@endsection
