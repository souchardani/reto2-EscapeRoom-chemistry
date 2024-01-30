@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 3')
@section('content')

{{-- cuando se haga una nueva insercion correcta, aparecerá el mensaje --}}
@if(session('success'))
    <div class="text-4xl text-center border border-zinc-400 shadow-xl my-4 p-8 bg-green-400 font-semibold rounded-xl">
        {{ session('success') }}
    </div>
@endif

<div class="flex flex-col items-center justify-center">
    <div class="flex flex-col mr-10">
        <h2 class="text-xl">Deseas añadir un nuevo registro a la tabla?</h2><a href="{{ route('admin.game3create') }}" class="bg-green-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-green-300 text-center">Nuevo Registro</a>
    </div>

    <table class="text-center text-2xl">
        <tr>
            <th class="p-3">Palabra</th>
            <th class="p-3">Acciones</th>
        </tr>

        @foreach ($game3_data as $game3)
            <tr>
                <td class="p-3 my-4">{{ $game3->word }}</td>
                <td class="p-3 my-4">
                    <a class="bg-blue-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-blue-300" href="{{route('admin.game3edit', $game3->id)}}">Editar</a>
                    <a class="ml-2 bg-red-400 rounded-lg p-2 shadow-xl hover:bg-red-500" href="{{route('admin.game3destroy', $game3->id)}}">Eliminar</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
{{ $game3_data->links() }}
@endsection
