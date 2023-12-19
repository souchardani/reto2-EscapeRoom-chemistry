@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 2')
@section('content')

<table class="text-center">
    <tr>
        <th>Compuesto</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>

    @foreach ($game2_data as $game2)
        <tr>
            <td>{{ $game2->compound }}</td>
            <td>{{ $game2->category }}</td>
            <td><a href="">botones</a></td>
        </tr>
    @endforeach
</table>

{{ $game2_data->links() }}
@endsection
