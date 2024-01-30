@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 3 - Eliminar')
@section('content')
    <div class="text-2xl shadow-xl">
        <form action="{{route('admin.game3destroyConfirm', $game3->id)}}" method="post">
            @csrf
            @method('delete')
            <div class="flex flex-col">
                <label for="word" class="p-3">Palabra :
                <input type="text" name="word" id="word" disabled required value="{{$game3->word}}" class="shadow-xl border rounded-xl p-2"></label>
                @if ($errors->has('word'))
                    <span>El campo palabra es obligatorio</span>
                @endif
            </div>

            <div class="flex justify-center p-2 my-3 ">
                <input type="submit" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500" value="Eliminar">
                <a href="{{route('admin.game3')}}" class="shadow-xl border rounded-xl p-2 bg-gray-400 hover:bg-gray-500">Cancelar</a>
            </div>
        </form>
        </div>
@endsection
