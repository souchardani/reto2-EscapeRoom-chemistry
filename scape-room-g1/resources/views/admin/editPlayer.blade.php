@extends('layouts.CRUDlayout')
@section('title', 'Editar Jugador')
@section('content')

<!-- Displays this message if the previous creation was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<div class="text-2xl shadow-xl py-4 px-3 rounded-md">
    <form action="{{route('admin.store.player', $player->id)}}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="flex flex-col">
            <label for="word" class="p-3">Nombre:</label>
            <input type="text" name="nick" id="nick" value="{{$player->nick}}" class="shadow-xl border rounded-xl p-2"><br>
            @if ($errors->has('nick'))
                <span>El campo palabra es obligatorio</span><br>
            @endif
        </div>
        <div class="flex justify-center p-2 my-3">
            <input type="submit" value="Modificar" class="shadow-xl border rounded-xl p-2 bg-green-300 mx-2 hover:bg-green-400">
            <a href="{{route('admin.show.players')}}" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500">Cancelar</a>
        </div>
    </form>
</div>
@endsection
