@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 1 - Nuevo')
@section('content')

<!-- Displays this message if the previous creation was successful -->
@if ($message = Session::get('success'))
    <div>{{$message}}</div>
@endif

<div class="text-2xl shadow-xl">
    <form action="{{route('admin.game1storeNew')}}" method="post"  enctype="multipart/form-data">
        @csrf

        <div class="flex flex-col">
            <label for="molecule" class="p-3">Molecula</label>
            <input type="text" name="molecule" id="molecule" value="{{old('molecule')}}" class="shadow-xl border rounded-xl p-2"><br>
            @if ($errors->has('molecule'))
                <span>El campo molecula es obligatorio</span><br>
            @endif

            <label for="img_molecule" class="p-3">Foto Molécula</label>
            <input name="img_molecule" id="img_molecule" type="file" class="shadow-xl border rounded-xl p-2"/><br>
            @if ($errors->has('img_molecule'))
                <span>El campo foto molécula es obligatorio</span><br>
            @endif

            <div class="flex justify-center p-2 my-3 ">
                <input type="submit" value="Crear" class="shadow-xl border rounded-xl p-2 bg-green-300 mx-2 hover:bg-green-400">
                <a href="{{route('admin.game1')}}" class="shadow-xl border rounded-xl p-2 bg-red-400 hover:bg-red-500">Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection
