@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 4')
@section('content')

<table class="text-center">
    <tr>
        <th>Medio cultivo</th>
        <th>Características</th>
        <th>Acciones</th>
    </tr>

    @foreach ($game4_data as $game4)
        <tr>
            <td>{{ $game4->growth }}</td>
            <td>{{ $game4->caracteristics }}</td>
            <td><a href="">botones</a></td>
        </tr>
    @endforeach
</table>

{{ $game4_data->links() }}
@endsection
