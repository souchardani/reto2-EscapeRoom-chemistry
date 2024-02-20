@extends('layouts.CRUDlayout')
@section('title', 'Jugadores')
@section('content')

{{-- cuando se haga una nueva insercion correcta, aparecerá el mensaje --}}
@if(session('success'))
    <div class="text-4xl text-center border border-zinc-400 shadow-xl my-4 p-8 bg-green-400 font-semibold rounded-xl">
        {{ session('success') }}
    </div>
@endif



<div class="flex flex-col items-center justify-center">

    <table class="text-center text-2xl">
        <tr>
            <th class="p-3">Nombre</th>
            <th class="p-3">Editar</th>
            <th class="p-3">Eliminar</th>
        </tr>

        @foreach ($players as $player)
            <tr>
                <td class="p-3 my-4">{{ $player->nick }}</td>

                <td class="p-3 my-4"><a class="bg-blue-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-blue-300" href="{{route('admin.game1edit', $player->id)}}">Editar</a></td>
                <td class="p-3 my-4"><a class="ml-2 bg-red-400 rounded-lg p-2 shadow-xl hover:bg-red-500" href="{{route('admin.game1destroy', $player->id)}}">Eliminar</a></td>
            </tr>
        @endforeach
    </table>
</div>
{{-- {{ $game1_data->links() }} --}}
@endsection
