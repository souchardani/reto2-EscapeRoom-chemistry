@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 3 - Eliminar')
@section('content')

    <h2>Estas a punto de borrar de forma permanente el siguiente registro.</h2><br>

    <table>
        <tr>
            <th>Palabra</th>
        </tr>
        <tr>
            <td>{{ $game3->word }}</td>
        </tr>
    </table>
    <br><br><br>
    <td>
        <form action="{{ route('admin.game3destroyConfirm', $game3->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Eliminar">
            <a href="{{ route('admin.game3') }}">Cancelar</a>
        </form>
    </td>

@endsection