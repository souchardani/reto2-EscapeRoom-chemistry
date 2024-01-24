@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 4')
@section('content')

<a href="{{route('admin.game4create')}}">Crear</a>
<br><br><br>

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
            <td><a class="" href="{{route('admin.game4edit', $game4->id)}}">Editar</a></td>
            <td><a class="" href="{{route('admin.game4destroy', $game4->id)}}">Eliminar</a></td>
        </tr>
    @endforeach
</table>

{{ $game4_data->links() }}
@endsection
