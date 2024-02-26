@extends('layouts.CRUDlayout')
@section('title', 'Eliminar Jugador')
@section('content')

    <div class="text-2xl shadow-xl">
        <form action="{{route('admin.destroy.player.confirm', $player->id)}}" method="post">
            @csrf
            @method('delete')
            <div class="flex flex-col">
                <label for="compound" class="p-3">Nombre:
                <input type="text" name="nick" id="nick" disabled required value="{{$player->nick}}" class="shadow-xl border rounded-xl p-2"></label>
                @if ($errors->has('nick'))
                    <span>El nombre es obligatorio</span>
                @endif
            </div>
            <div class="flex justify-center p-2 my-3 ">
            <input type="submit" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500" value="Eliminar Jugador">
            <a href="{{route('admin.show.players')}}" class="shadow-xl border rounded-xl p-2 bg-gray-400 hover:bg-gray-500">Cancelar</a>
            </div>
        </form>
        </div>
@endsection
