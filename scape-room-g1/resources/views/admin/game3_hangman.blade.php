@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 3')
@section('content')

<a href="{{route('admin.game3create')}}">Crear</a>
<br><br><br>

<table class="text-center">
    <tr>
        <th>Palabra</th>
        <th>Acciones</th>
    </tr>

    @foreach ($game3_data as $game3)
        <tr>
            <td>{{ $game3->word }}</td>
            <td><a class="" href="{{route('admin.game3edit', $game3->id)}}">Editar</a></td>
            <td><a class="" href="{{route('admin.game3destroy', $game3->id)}}">Eliminar</a></td>
        </tr>
    @endforeach
</table>

{{ $game3_data->links() }}
@endsection
