@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 1 - Editar')
@section('content')


<div class="text-2xl shadow-xl">
    <form action="{{route('admin.game1storeEdit', $game1->id)}}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="flex flex-col">
            <label for="molecule" class="p-3">Molécula</label>
            <input type="text" name="molecule" id="molecule" class="shadow-xl border rounded-xl p-2" required value="{{ $game1->molecule }}"><br>
            @if ($errors->has('molecule'))
                <span>El campo Molécula es obligatorio</span>
            @endif
            <label for="img_molecule" class="p-3">Foto Molécula</label>
            <img src="/img/game1_puzzles_img/{{ $game1->img_molecule }}" alt="{{ $game1->img_molecule }}" class="shadow-xl border rounded-xl p-2 w-32"><br>
            <input type="hidden" name="old_imgName" id="old_imgName" value="{{ $game1->img_molecule }}">
            <input name="img_molecule" id="img_molecule" type="file" class="shadow-xl border rounded-xl p-2 w-100"/>
            @if ($errors->has('img_molecule'))
                <span>El campo foto molécula es obligatorio</span>
            @endif
        </div>

        <div class="flex justify-center p-2 my-3 ">
            <input type="submit" value="Guardar cambios" class="shadow-xl border rounded-xl p-2 bg-green-300 mx-2 hover:bg-green-400">
            <a href="{{route('admin.game1')}}" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500">Cancelar</a>
        </div>
    </form>
</div>
@endsection
