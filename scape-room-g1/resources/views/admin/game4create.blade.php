@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 4 - Nuevo')
@section('content')

<!-- Displays this message if the previous creation was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<div class="text-2xl shadow-xl">
    <form action="{{route('admin.game4storeNew')}}" method="post">
        @csrf

        <div class="flex flex-col">
            <label for="growth" class="p-3">Medio cultivo</label>
            <input type="text" name="growth" id="growth" value="{{old('growth')}}" class="shadow-xl border rounded-xl p-2"><br>
            @if ($errors->has('growth'))
                <span>El campo medio cultivo es obligatorio</span><br>
            @endif

            <label for="caracteristics" class="p-3">Características</label>
            <input type="text" name="caracteristics" id="caracteristics" value="{{old('caracteristics')}}" class="shadow-xl border rounded-xl p-2"><br>
            @if ($errors->has('caracteristics'))
                <span>El campo características es obligatorio</span><br>
            @endif
        </div>

        <div class="flex justify-center p-2 my-3 ">
            <input type="submit" value="Crear" class="shadow-xl border rounded-xl p-2 bg-green-300 mx-2 hover:bg-green-400">
            <a href="{{route('admin.game4')}}" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500">Cancelar</a>
        </div>
    </form>
</div>
@endsection
