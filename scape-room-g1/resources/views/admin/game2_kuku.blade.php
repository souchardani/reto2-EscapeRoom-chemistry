@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 2')
@section('content')

{{-- cuando se haga una nueva insercion correcta, aparecerá el mensaje --}}
@if(session('success'))
    <div class="text-4xl text-center border border-zinc-400 shadow-xl my-4 p-8 bg-green-400 font-semibold rounded-xl">
        {{ session('success') }}
    </div>
@endif

<br><br><br>
<div class="flex flex-col items-center justify-center">
    <div class="flex flex-col mr-10">
        <h2 class="text-xl">Deseas añadir un nuevo registro a la tabla?</h2><a href="{{ route('admin.game2create') }}" class="bg-green-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-green-300 text-center">Nuevo Registro</a>
    </div>

    <table class="text-center text-2xl">
        <tr>
            <th class="p-3">Compuesto</th>
            <th class="p-3">Categoría</th>
            <th class="p-3">Acciones</th>
        </tr>

        @foreach ($game2_data as $game2)
            <tr>
                <td class="p-3 my-4">{{ $game2->compound }}</td>
                <td class="p-3 my-4">{{ $game2->category }}</td>
                <td class="p-3 my-4">
                    <a class="bg-blue-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-blue-300" href="{{route('admin.game2edit', $game2->id)}}">Editar</a>
                    <a class="ml-2 bg-red-400 rounded-lg p-2 shadow-xl hover:bg-red-500" href="{{route('admin.game2destroy', $game2->id)}}">Eliminar</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{ $game2_data->links() }}
@endsection
