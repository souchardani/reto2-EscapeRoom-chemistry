@extends('layouts.CRUDlayout')
@section('title', 'Juego 4')
@section('content')

{{-- cuando se haga una nueva insercion correcta, aparecerá el mensaje --}}
@if(session('success'))
    <div class="text-4xl text-center border border-zinc-400 shadow-xl my-4 p-8 bg-green-400 font-semibold rounded-xl">
        {{ session('success') }}
    </div>
@endif

<div class="flex flex-col items-center justify-center">
    <div class="flex flex-col mr-10">
        <h2 class="text-xl">Deseas añadir un nuevo registro a la tabla?</h2><a href="{{ route('admin.game4create') }}" class="bg-green-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-green-300 text-center">Nuevo Registro</a>
    </div>

    <table class="text-center text-2xl">
        <tr>
            <th class="p-3">Medio cultivo</th>
            <th class="p-3">Características</th>
            <th class="p-3">Acciones</th>
        </tr>

        @foreach ($game4_data as $game4)
            <tr>
                <td class="p-3 my-4">{{ $game4->growth }}</td>
                <td class="p-3 my-4">{{ $game4->caracteristics }}</td>
                <td class="p-3 my-4 flex">
                    <a href="{{ route('admin.game4edit',$game4->id) }}" class="bg-blue-200 rounded-lg p-2 mx-4 shadow-xl hover:bg-blue-300">Modificar</a>
                    <a href="{{ route('admin.game4destroy',$game4->id) }}" class="ml-2 bg-red-400 rounded-lg p-2 shadow-xl hover:bg-red-500">Borrar</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

{{ $game4_data->links() }}
@endsection
