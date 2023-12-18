@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 1')
@section('content')

<table class="text-center">
    <tr>
        <th>Molecula</th>
        <th>Foto Molecula</th>
        <th>Acciones</th>
    </tr>

    @foreach ($game1_data as $game1)
        <tr>
            <td>{{ $game1->molecule }}</td>
            <td><img src="/img/game1_puzzles_img/{{ $game1->img_molecule }}" alt="{{ $game1->img_molecule }}"></td>
            <td><a href="">botones</a></td>
        </tr>
    @endforeach
</table>

{{ $game1_data->links() }}
@endsection
