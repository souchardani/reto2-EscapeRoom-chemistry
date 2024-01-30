@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 4 - Eliminar')
@section('content')
    <div class="text-2xl shadow-xl">
        <form action="{{route('admin.game4destroyConfirm', $game4->id)}}" method="post">
            @csrf
            @method('delete')
            <div class="flex flex-col">
                <label for="growth" class="p-3">Medio cultivo:
                <input type="text" name="growth" id="growth" disabled required value="{{$game4->growth}}" class="shadow-xl border rounded-xl p-2"></label>
                @if ($errors->has('cientifico'))
                    <span>El campo medio cultivo es obligatorio</span>
                @endif

                <label for="caracteristics" class="p-3">Características:
                <input type="text" name="caracteristics" id="caracteristics" disabled required value="{{$game4->caracteristics}}" class="shadow-xl border rounded-xl p-2"></label>
                @if ($errors->has('clave'))
                    <span>El campo características es obligatorio</span>
                @endif
            </div>
            <div class="flex justify-center p-2 my-3 ">
                <input type="submit" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500" value="Eliminar">
                <a href="{{route('admin.game4')}}" class="shadow-xl border rounded-xl p-2 bg-gray-400 hover:bg-gray-500">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
