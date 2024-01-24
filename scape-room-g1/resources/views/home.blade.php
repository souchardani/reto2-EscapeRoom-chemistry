<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="flex flex-col items-center">
        <div>
            <h1 class="text-5xl my-4 bg-black text-white font-bold p-6 rounded-xl">Administrador de Juegos</h1>
        </div>
        <div class="grid grid-cols-3 gap-6 my-6">
            <div class="flex justify-center items-center bg-green-200 w-60 h-48  rounded-xl shadow-lg hover:scale-110 hover:shadow-xl border-2 border-gray-300">
                <a href="{{ route('admin.game1') }}" class="font-semibold text-xl">Puzzle</a>
            </div>
            <div class="flex justify-center items-center bg-blue-200 w-60 h-48  rounded-xl shadow-lg hover:scale-110 hover:shadow-xl border-2 border-gray-300">
                <a href="{{ route('admin.game2') }}" class="font-semibold text-xl">Kuku</a>
            </div>
            <div class="flex justify-center items-center bg-gray-200 w-60 h-48  rounded-xl shadow-lg hover:scale-110 hover:shadow-xl border-2 border-gray-300">
                <a href="{{ route('admin.game3') }}" class="font-semibold text-xl">Hangmen</a>
            </div>
            <div class="flex justify-center items-center bg-red-200 w-60 h-48  rounded-xl shadow-lg hover:scale-110 hover:shadow-xl border-2 border-gray-300">
                <a href="{{ route('admin.game4') }}" class="font-semibold text-xl">Pairs</a>
            </div>
            <div class="flex justify-center items-center bg-orange-200 w-60 h-48  rounded-xl shadow-lg hover:scale-110 hover:shadow-xl border-2 border-gray-300">
                <a href="#" class="font-semibold text-xl">Endgame</a>
            </div>
        </div>
    </div>
</body>
</html>
