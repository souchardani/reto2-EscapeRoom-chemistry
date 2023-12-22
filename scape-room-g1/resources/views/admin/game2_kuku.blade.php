@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 2')
@section('content')

<a href="{{route('admin.game2create')}}">Crear</a>
<br><br><br>

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
            <td><a class="" href="{{route('admin.game2edit', $game2->id)}}">Editar</a></td>
            <td><a class="" href="{{route('admin.game2destroy', $game2->id)}}">Eliminar</a></td>
        </tr>
    @endforeach
</table>

{{ $game2_data->links() }}
@endsection
