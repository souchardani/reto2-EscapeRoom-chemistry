@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 5')
@section('content')
<div class="flex flex-col items-center justify-center">
    <h2 class="text-xl">Deseas añadir un nuevo registro a la tabla?</h2><a href="" class="bg-green-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-green-300">Nuevo Registro</a>
    <table class=" text-center text-2xl">
        <tr>
            <th class="p-3">id</th>
            <th class="p-3">Cientifico</th>
            <th class="p-3">Clave</th>
        </tr>

        @foreach ($game5_data as $game5)
            <tr>
                <td class="p-3 my-4">{{ $game5->id }}</td>
                <td class="p-3 my-4">{{ $game5->nombreCientifico }}</td>
                <td class="p-3 my-4">{{ $game5->clave }}</td>
                <td class="p-3 my-4"><a href="" class="bg-blue-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-blue-300">Modificar</a><a href="" class="ml-2 bg-red-400 rounded-lg p-2 shadow-xl hover:bg-red-500">Borrar</a></td>
            </tr>
        @endforeach
    </table>
</div>
{{ $game5_data->links() }}
@endsection
