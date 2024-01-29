@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 1')
@section('content')

{{-- cuando se haga una nueva insercion correcta, aparecerá el mensaje --}}
@if(session('success'))
    <div class="text-4xl text-center border border-zinc-400 shadow-xl my-4 p-8 bg-green-400 font-semibold rounded-xl">
        {{ session('success') }}
    </div>
@endif



<div class="flex flex-col items-center justify-center">
    <div class="flex flex-col">
        <h2 class="text-xl">Deseas añadir un nuevo registro a la tabla?</h2><a href="{{ route('admin.game1create') }}" class="bg-green-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-green-300 text-center">Nuevo Registro</a>
    </div>

    <table class="text-center text-2xl">
        <tr>
            <th class="p-3">Molecula</th>
            <th class="p-3">Foto Molecula</th>
            <th class="p-3">Acciones</th>
        </tr>

        @foreach ($game1_data as $game1)
            <tr>
                <td class="p-3 my-4">{{ $game1->molecule }}</td>
                <td class="p-3 my-4 w-32"><img src="{{ URL::to('/') }}/img/game1_puzzles_img/{{ $game1->img_molecule }}" alt="{{ $game1->img_molecule }}"></td>

                <td class="p-3 my-4"><a class="bg-blue-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-blue-300" href="{{route('admin.game1edit', $game1->id)}}">Editar</a></td>
                <td class="p-3 my-4"><a class="ml-2 bg-red-400 rounded-lg p-2 shadow-xl hover:bg-red-500" href="{{route('admin.game1destroy', $game1->id)}}">Eliminar</a></td>
            </tr>
        @endforeach
    </table>
</div>
{{ $game1_data->links() }}
@endsection
