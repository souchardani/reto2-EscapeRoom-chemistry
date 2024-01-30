@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 3 - Nuevo')
@section('content')

<!-- Displays this message if the previous creation was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<div class="text-2xl shadow-xl">
    <form action="{{route('admin.game3storeNew')}}" method="post">
        @csrf

        <div class="flex flex-col">
            <label for="word" class="p-3">Palabra</label>
            <input type="text" name="word" id="word" value="{{old('word')}}" class="shadow-xl border rounded-xl p-2"><br>
            @if ($errors->has('word'))
                <span>El campo palabra es obligatorio</span><br>
            @endif
        </div>

        <div class="flex justify-center p-2 my-3 ">
            <input type="submit" value="Crear" class="shadow-xl border rounded-xl p-2 bg-green-300 mx-2 hover:bg-green-400">
            <a href="{{route('admin.game3')}}" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500">Cancelar</a>
        </div>
    </form>
</div>
@endsection


