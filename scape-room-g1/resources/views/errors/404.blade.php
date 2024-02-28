<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>404</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div
        class=" container-fluid min-h-screen px-8 p-3 md:px-20 grid place-content-center"
        style="
            background-color: rgb(88, 28, 135);
            background-image: radial-gradient(
                    at 86% 61%,
                    rgb(190, 24, 93) 0,
                    transparent 57%
                ),
                radial-gradient(
                    at 56% 55%,
                    rgb(52, 211, 153) 0,
                    transparent 28%
                ),
                radial-gradient(
                    at 49% 17%,
                    rgb(34, 211, 238) 0,
                    transparent 75%
                ),
                radial-gradient(at 75% 23%, rgb(30, 64, 175) 0, transparent 73%),
                radial-gradient(
                    at 77% 71%,
                    rgb(252, 211, 77) 0,
                    transparent 25%
                ),
                radial-gradient(
                    at 87% 91%,
                    rgb(139, 92, 246) 0,
                    transparent 81%
                );
        "
    >
        <div class="mx-24 flex justify-center items-center gap-10 flex-col">
            <h1 class="text-white text-center text-xl"> Ocurrio un error, debido a que intentaste acceder a una pagina que no existe o que no tienes permisos para acceder a ella. por favor verifica la url que ingresaste o que tienes permisos para acceder a esta pagina.</h1>
            <h1 class="text-white text-center text-xl"> El Escape Room de quimica no permite acceder desde la url. debes entrar desde el inicio de la página</h1>
            <a  class="rounded-2xl bg-white bg-opacity-40 px-5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-red-500 hover:text-white cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white" href="/">Volver a inicio</a>
            <img class="w-60" src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExMHk3dGg4ZzFqcXU5b3o3Z3Jodnc3ZjRoZHI1NTZrZ3V0Y20wbWxlZSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/C21GGDOpKT6Z4VuXyn/giphy.gif" alt="">
        </div>
    </div>
    </body>
</html>
