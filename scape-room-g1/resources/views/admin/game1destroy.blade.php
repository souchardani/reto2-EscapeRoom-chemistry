@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 1 - Eliminar')
@section('content')

<div class="text-2xl shadow-xl">
    <form action="{{route('admin.game1destroyConfirm', $game1->id)}}" method="post">
        @csrf
        @method('delete')
        <div class="flex flex-col">
            <label for="molecule" class="p-3">Molécula:
            <input type="text" name="molecule" id="molecule" disabled required value="{{$game1->molecule}}" class="shadow-xl border rounded-xl p-2"></label>
            @if ($errors->has('molecule'))
                <span>El molécula es obligatorio</span>
            @endif

            <label for="img_molecule" class="p-3">Foto Molécula:
            <img src="/img/game1_puzzles_img/{{ $game1->img_molecule }}" alt="{{ $game1->img_molecule }}" class="shadow-xl border rounded-xl p-2 w-32">
            @if ($errors->has('img_molecule'))
                <span>El foto molécula es obligatorio</span>
            @endif
        </div>
        <div class="flex justify-center p-2 my-3 ">
            <input type="submit" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500" value="Eliminar">
            <a href="{{route('admin.game1')}}" class="shadow-xl border rounded-xl p-2 bg-gray-400 hover:bg-gray-500">Cancelar</a>
        </div>
    </form>
</div>

@endsection
