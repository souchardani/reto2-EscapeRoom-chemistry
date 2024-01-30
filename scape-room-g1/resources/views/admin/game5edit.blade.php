@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 5 - Modificar')
@section('content')

<div class="text-2xl shadow-xl">
<form action="{{ route('admin.game5editStore',$game5->id) }}" method="post"  enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="flex flex-col">
        <label for="cientifico" class="p-3">Cientifico :
        <input type="text" name="cientifico" id="cientifico" required value="{{$game5->nombreCientifico}}" class="shadow-xl border rounded-xl p-2"></label>
        @if ($errors->has('cientifico'))
            <span>El campo cientifico es obligatorio</span>
        @endif

        <label for="clave" class="p-3">Clave :
        <input type="text" name="clave" id="clave" required value="{{$game5->clave}}" class="shadow-xl border rounded-xl p-2"></label>
        @if ($errors->has('clave'))
            <span>El campo clave es obligatorio</span>
        @endif
    </div>
    <div class="flex justify-center p-2 my-3">
        <input type="submit" value="Modificar" class="shadow-xl border rounded-xl p-2 bg-green-300 mx-2 hover:bg-green-400">
        <a href="{{route('admin.game5')}}" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500">Cancelar</a>
    </div>
</form>
</div>
@endsection
