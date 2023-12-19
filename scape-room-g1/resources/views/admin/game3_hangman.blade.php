@extends('layouts.CRUDlayout')
@section('title', 'CRUD Admin - Juego 3')
@section('content')

<table class="text-center">
    <tr>
        <th>Palabra</th>
        <th>Acciones</th>
    </tr>

    @foreach ($game3_data as $game3)
        <tr>
            <td>{{ $game3->word }}</td>
            <td><a href="">botones</a></td>
        </tr>
    @endforeach
</table>

{{ $game3_data->links() }}
@endsection
