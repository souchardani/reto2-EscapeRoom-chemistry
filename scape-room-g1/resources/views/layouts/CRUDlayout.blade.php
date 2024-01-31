<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<div class="min-h-full">
    <nav class="bg-gray-700">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg height="70" viewBox="0 0 512 512" width="70" xmlns="http://www.w3.org/2000/svg"><path d="m317.377879 189.768973c1.659199 0 3.013949 1.297536 3.105407 2.933766l.004921.176563v17.106807c0 1.657698-1.297536 3.013846-2.933766 3.105402l-.176562.004927h-12.441315v30.649178c0 1.227414.296637 2.435226.862359 3.521617l.160939.293201 83.894894 144.261708c2.664244 4.614173 2.724795 10.273981.181653 14.935682l-.181653.32359-30.431455 53.286151c-2.666938 4.618838-7.546953 7.502337-12.8609 7.625524l-.354886.004112h-180.515699c-5.333875 0-10.270379-2.78309-13.034733-7.324296l-.181053-.30534-30.431455-53.286151c-2.664244-4.614172-2.724795-10.273981-.181653-14.935682l.181653-.32359 83.674061-144.261708c.620954-1.077284 1.160112-2.288662 1.233967-3.528295l.008609-.286523v-30.649178h-12.441315c-1.657698 0-3.013845-1.298986-3.105402-2.933916l-.004926-.176413v-17.106807c0-1.6592 1.298985-3.013949 2.933916-3.105408l.176412-.004921zm-35.76878 23.327465h-51.320422v35.404871c0 2.530684-.628388 5.018366-1.826207 7.241639l-.217279.389552-80.212266 139.762617c-1.313669 2.274928-1.360586 5.061763-.139355 7.37465l.140911.254987 20.741226 35.921185c1.315347 2.279335 3.709317 3.713459 6.326649 3.809654l.281244.005164 25.572322-.000074-22.604602-39.153209c-1.313669-2.276428-1.360586-5.06187-.14075-7.374655l.14075-.254982 19.67905-34.086091 146.605552-.000063-11.648-20.297-54.258987.000613-8.820892-15.277934 54.311879-.000679-16.333-28.46-54.780408.000083-8.820892-15.277934 54.8333-.000149-15.464782-26.946183c-1.264608-2.191399-1.964638-4.660232-2.038516-7.185091l-.006525-.4461zm72.843823 166.401245-54.181384.00087 8.820892 15.551644 54.285492-.000514zm-129.531428-254.708141c8.427435 0 15.259272 6.833392 15.259272 15.260828 0 8.427435-6.831837 15.259272-15.259272 15.259272-8.427436 0-15.259273-6.831837-15.259273-15.259272 0-8.427436 6.831837-15.260828 15.259273-15.260828zm57.574826-32.7430514c12.641931 0 22.890464 10.2469774 22.890464 22.8889084 0 12.640376-10.248533 22.888909-22.890464 22.888909-12.64193 0-22.888908-10.248533-22.888908-22.888909 0-12.641931 10.246978-22.8889084 22.888908-22.8889084zm-34.686385-47.0518075c8.427436 0 15.260828 6.833392 15.260828 15.2608275 0 8.4274354-6.833392 15.2592723-15.260828 15.2592723-8.42588 0-15.259272-6.8318369-15.259272-15.2592723 0-8.4274355 6.833392-15.2608275 15.259272-15.2608275z" fill="#4285f4" fill-rule="evenodd"/></svg>
                    </div>
                    <!-- A veces se bugea y muestra el menu y los botones con 600px -->
                    <div class="max-sm:hidden">
                        <div class="bg-gray-700">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('dashboard') }}" class="bg-gray-700 hover:text-white ttext-gray-300 rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">Inicio</a>
                            <a href="{{ route('admin.game1') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Juego 1</a>
                            <a href="{{ route('admin.game2') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Juego 2</a>
                            <a href="{{ route('admin.game3') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Juego 3</a>
                            <a href="{{ route('admin.game4') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Juego 4</a>
                            <a href="{{ route('admin.game5') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Juego 5</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex sm:hidden">
                <!-- Mobile menu button -->
                {{-- <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button> --}}
            </div>
        </div>
</div>

<!-- Mobile menu, show/hide based on menu state. -->
<div class="sm:hidden bg-gray-800" id="mobile-menu">
    <div class=" flex space-y-0 px-2 pb-3 pt-2 sm:px-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="{{ route('dashboard') }}" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-small md:font-medium" aria-current="page">Inicio</a>
        <a href="{{ route('admin.game1') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-small md:font-medium">Juego 1</a>
        <a href="{{ route('admin.game2') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-small md:font-medium">Juego 2</a>
        <a href="{{ route('admin.game3') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-small md:font-medium">Juego 3</a>
        <a href="{{ route('admin.game4') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-small md:font-medium">Juego 4</a>
        <a href="{{ route('admin.game5') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-small md:font-medium">Juego 5</a>
    </div>
</div>
</nav>

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">@yield('title')</h1>
    </div>
</header>

<body>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</body>
</div>



</html>
