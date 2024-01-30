@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 2 - Eliminar')
@section('content')

    <div class="text-2xl shadow-xl">
        <form action="{{route('admin.game2destroyConfirm', $game2->id)}}" method="post">
            @csrf
            @method('delete')
            <div class="flex flex-col">
                <label for="compound" class="p-3">Compuesto :
                <input type="text" name="compound" id="compound" disabled required value="{{$game2->compound}}" class="shadow-xl border rounded-xl p-2"></label>
                @if ($errors->has('compound'))
                    <span>El campo compuesto es obligatorio</span>
                @endif

                <label for="category" class="p-3">Categoría :
                <input type="text" name="category" id="category" disabled required value="{{$game2->category}}" class="shadow-xl border rounded-xl p-2"></label>
                @if ($errors->has('clave'))
                    <span>El campo categoría es obligatorio</span>
                @endif
            </div>
            <div class="flex justify-center p-2 my-3 ">
            <input type="submit" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500" value="Eliminar">
            <a href="{{route('admin.game2')}}" class="shadow-xl border rounded-xl p-2 bg-gray-400 hover:bg-gray-500">Cancelar</a>
            </div>
        </form>
        </div>
@endsection
