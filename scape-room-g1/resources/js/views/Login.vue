<template>
    <!-- component -->
    <div
        class="container-fluid backdrop-blur-lg"
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
        <div v-show="idioma.find((idioma) => idioma.estado)?.name === 'es'">
            <div class="flex flex-col-reverse justify-center md:flex-row">
                <div
                    class="relative bg-cover lg:block lg:w-2/3 max-md:mx-8 max-md:rounded-2xl overflow-hidden"
                    style="background-image: url(/img/puerta.jpg)"
                >
                    <div
                        class="flex items-center h-96 md:h-full px-20 bg-gray-900 bg-opacity-75"
                    >
                        <div>
                            <h2 class="text-4xl font-bold text-white">
                                Que tenía el Vial
                                <i
                                    class="ph ph-flask font-5xl"
                                    @click="
                                        showPass({
                                            descripcion:
                                                'JAJA, te has equivocado, y recuerda, este no es un tubo de ensayo, es un matraz',
                                            titulo: 'No tan Rápido',
                                            bgColor: 'bg-red-500',
                                            srcGift:
                                                'https://media.giphy.com/media/l0HlUxcWRsqROFYuk/giphy.gif',
                                        })
                                    "
                                    alt="matraz"
                                ></i>
                            </h2>

                            <p class="max-w-xl mt-3 text-gray-300 text-lg">
                                Entra en nuestro scape room y descubre un mundo
                                de aventuras!
                            </p>
                        </div>

                        <i
                            class="absolute ph ph-test-tube lg:bottom-150 left-3 text-2xl"
                            @click="
                                showPass({
                                    titulo: 'Lo has Conseguido',
                                    bgColor: 'bg-green-500',
                                    descripcion: `Enhorabuena, Encontraste una etiqueta en el vial. En ella se lee: ${this.pass}`,
                                    srcGift:
                                        'https://media.giphy.com/media/PkoGC4SZK3DynYxlXy/giphy.gif',
                                })
                            "
                            alt="vial"
                        ></i>
                    </div>
                </div>

                <div
                    class="flex items-center w-full max-w-md px-6 mx-auto lg:w-1/3 mt-10 mb-12"
                >
                    <div class="flex-1">
                        <div class="text-center">
                            <h2 class="text-4xl font-bold text-center">
                                Accede al juego
                            </h2>
                            <!-- <img src="../assets/img/puerta.jpg" alt="" /> -->

                            <p class="my-5">
                                Introduce un nick para guardar tu progreso y tu
                                clasificacion, y la contraseña de acceso.
                            </p>
                            <!-- tarjeta -->

                            <div
                                v-show="showModalInfo"
                                id="tarjeta-info"
                                class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative"
                            >
                                <i class="ph ph-info text-2xl"></i>
                                <span class="text-left">
                                    Aqui tienes tu primer reto, presiona el tubo
                                    de ensayo escondido en la página (debes
                                    buscar bien) y descubre como puedes
                                    encontrar la contraseña de acceso
                                </span>
                                <i
                                    class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                                    @click="showModalInfo = false"
                                ></i>
                            </div>
                        </div>
                        <div class="w-100 my-8">
                            <div
                                class="w-full text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
                                style="backdrop-filter: blur(20px)"
                            >
                                <div class="mx-auto">
                                    <!-- aqui va el contenido dentro del glass -->
                                    <div class="mt-6">
                                        <!-- este el el badge de un error -->
                                        <div
                                            v-show="showErrorMessage"
                                            class="relative bg-red-100 border-t border-b text-red-700 px-4 py-3 rounded-xl mb-4"
                                        >
                                            <p class="font-bold">
                                                Error en el formulario
                                            </p>
                                            <p class="text-sm">
                                                {{ txtErrorMsg }}
                                            </p>
                                            <i
                                                class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                                                @click="
                                                    showErrorMessage = false
                                                "
                                            ></i>
                                        </div>
                                        <form @submit.prevent>
                                            <div v-if="registrado.logeado">
                                                <label
                                                    for="nickJugador"
                                                    class="block mb-2 text-2xl font-bold"
                                                    >Bienvenido
                                                    {{ registrado.name }}</label
                                                >
                                            </div>
                                            <div v-else="registrado.logeado">
                                                <label
                                                    for="nickJugador"
                                                    class="block mb-2 text-xl font-bold"
                                                    >Bienvenido Anónimo</label
                                                >
                                            </div>

                                            <div class="mt-6">
                                                <div
                                                    class="flex justify-between mb-2"
                                                >
                                                    <label
                                                        for="clave-acceso"
                                                        class="text-sm font-bold"
                                                        >Clave de acceso</label
                                                    >
                                                    <a
                                                        @click.prevent="
                                                            showModalInfo = true
                                                        "
                                                        href="#"
                                                        class="text-sm focus:text-blue-500 hover:text-blue-500 hover:underline"
                                                        >No tienes la clave?</a
                                                    >
                                                </div>

                                                <input
                                                    @focus="
                                                        showErrorMessage = false
                                                    "
                                                    v-model="txtPassword"
                                                    type="password"
                                                    name="clave-acceso"
                                                    id="clave-acceso"
                                                    placeholder="Debes buscar la clave con las pistas de la web"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                                />
                                            </div>
                                            <div class="mt-6">
                                                <div
                                                    class="flex justify-between mb-2"
                                                >
                                                    <label
                                                        for="dificultad"
                                                        class="text-sm font-bold"
                                                        >Nivel de
                                                        Dificultad</label
                                                    >
                                                    <i
                                                        @click="
                                                            mostrarInfoDificultad = true
                                                        "
                                                        class="ph ph-info text-2xl"
                                                    ></i>
                                                </div>

                                                <select
                                                    @focus="
                                                        showErrorMessage = false
                                                    "
                                                    v-model="cmbDificultad"
                                                    name="dificultad"
                                                    id="dificultad"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                                >
                                                    option
                                                    <option value="Facil">
                                                        Principiante
                                                    </option>
                                                    <option value="Normal">
                                                        Medio
                                                    </option>
                                                    <option value="Dificil">
                                                        Avanzado
                                                    </option>
                                                </select>
                                            </div>
                                            <div
                                                class="mt-6 flex justify-around"
                                            >
                                                <button
                                                    v-if="!visible"
                                                    @click="validar"
                                                    style="
                                                        backdrop-filter: blur(
                                                            20px
                                                        );
                                                    "
                                                    class="rounded-md bg-white bg-opacity-60 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                                                >
                                                    Iniciar partida
                                                </button>
                                                <button
                                                    v-if="!visible"
                                                    @click="logout"
                                                    style="
                                                        backdrop-filter: blur(
                                                            20px
                                                        );
                                                    "
                                                    class="rounded-md bg-white bg-opacity-60 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                                                >
                                                    Cerrar Sesión
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer transparente -->
        <div class="w-100 p-3 m-6 md:hidden">
            <div
                class="text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
                style="backdrop-filter: blur(20px)"
            >
                <div class="mx-auto">
                    <div>
                        <div class="text-black w-full h-25 p-4">
                            <div class="my-1">
                                <span class="font-medium">Colaboradores:</span>
                                <span class=""
                                    >Alumnos de 2DW3A y dpto. Química</span
                                >
                            </div>
                            <div class="my-1">
                                <span class="font-medium">Email: </span>
                                <span>alumnos@txurdinaga.eus</span>
                            </div>
                            <div class="my-1">
                                <span class="font-medium">Telf: </span>
                                <span>555-222-123</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ModalStartGame
            @close="inicioJuegoDesdeModal"
            :showModal="showModalStart"
            bgColor="bg-blue-500"
            titulo="Bienvenido al juego"
            textoBotonCerrar="Iniciar partida"
            ><strong
                >Bienvenido al juego,
                <span class="text-blue-900">{{ this.txtNick }}</span></strong
            >
            <p>
                Tienes la oportunidad de demostrar que eres un verdadero
                químico.
            </p>
            <p>
                Para ello, deberás superar una serie de pruebas que te llevarán
                a descubrir la contraseña final y salvar a la humanidad.
            </p>
            <p>
                Tendrás que usar tus habilidades e ingenio para resolver los
                retos que te proponemos.
            </p>
            <p>
                Recuerda, tienes solo 30 minutos, y cada vez que falles en un
                juego, perderás tiempo del reloj en función de la dificultad que
                hayas elegido. ¡Ánimo, y mucha suerte!
            </p></ModalStartGame
        >
        <ModalStartGame
            @close="hint.showModalHints = false"
            :showModal="hint.showModalHints"
            :bgColor="hint.bgHint"
            :titulo="hint.titulo"
            :texto="hint.descripcion"
        >
            <div @mouseover.prevent class="w-60 pb-6 relative">
                <img :src="hint.srcGift" alt="" />
            </div>
        </ModalStartGame>
        <ModalStartGame
            @close="mostrarInfoDificultad = false"
            :showModal="mostrarInfoDificultad"
            bgColor="bg-blue-500"
            titulo="Informacion de la dificultad"
        >
            <p>
                En base a la dificultad que elijas, tu temporizador se verá
                afectado.
            </p>
            <p>
                Para completar el juego tendrás 30 minutos, y por cada fallo en
                una de las pruebas, según la dificultad, se descontará tiempo
                del reloj:
            </p>
            <p class="font-bold">Fácil: 5 Minutos</p>

            <p class="font-bold">Medio: 7 Minutos</p>
            <p class="font-bold">Dificil: 12 Minutos</p>
        </ModalStartGame>

        <!-------------------------------------------------------------------------------------------------------------------------------->

        <!-- component -->
        <div v-show="idioma.find((idioma) => idioma.estado)?.name === 'en'">
            <div class="flex flex-col-reverse justify-center md:flex-row">
                <div
                    class="relative bg-cover lg:block lg:w-2/3 max-md:mx-8 max-md:rounded-2xl overflow-hidden"
                    style="background-image: url(/img/puerta.jpg)"
                >
                    <div
                        class="flex items-center h-96 md:h-full px-20 bg-gray-900 bg-opacity-75"
                    >
                        <div>
                            <h2 class="text-4xl font-bold text-white">
                                What did the Vial have?
                                <i
                                    class="ph ph-flask font-5xl"
                                    @click="
                                        showPass({
                                            descripcion:
                                                'JAJA, you have made a mistake, and remember, this is not a test tube, it is a flask.',
                                            titulo: 'Not so fast',
                                            bgColor: 'bg-red-500',
                                            srcGift:
                                                'https://media.giphy.com/media/l0HlUxcWRsqROFYuk/giphy.gif',
                                        })
                                    "
                                    alt="matraz"
                                ></i>
                            </h2>

                            <p class="max-w-xl mt-3 text-gray-300 text-lg">
                                Enter our scape room and discover a world of
                                adventures!
                            </p>
                        </div>

                        <i
                            class="absolute ph ph-test-tube lg:bottom-150 left-3 text-2xl"
                            @click="
                                showPass({
                                    titulo: 'You have succeeded',
                                    bgColor: 'bg-green-500',
                                    descripcion: `Congratulations, You found a label on the vial. It reads: ${this.pass}`,
                                    srcGift:
                                        'https://media.giphy.com/media/PkoGC4SZK3DynYxlXy/giphy.gif',
                                })
                            "
                            alt="vial"
                        ></i>
                    </div>
                </div>

                <div
                    class="flex items-center w-full max-w-md px-6 mx-auto lg:w-1/3 mt-10 mb-12"
                >
                    <div class="flex-1">
                        <div class="text-center">
                            <h2 class="text-4xl font-bold text-center">
                                Access to the game
                            </h2>
                            <!-- <img src="../assets/img/puerta.jpg" alt="" /> -->

                            <p class="my-5">
                                Enter a nickname to save your progress and your
                                ranking, and the rankings, and the access
                                password.
                            </p>
                            <!-- tarjeta -->

                            <div
                                v-show="showModalInfo"
                                id="tarjeta-info"
                                class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative"
                            >
                                <i class="ph ph-info text-2xl"></i>
                                <span class="text-left">
                                    Here is your first challenge, press the test
                                    tube hidden in the page tube hidden on the
                                    page (you must look well) and find out how
                                    you can find the access password
                                </span>
                                <i
                                    class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                                    @click="showModalInfo = false"
                                ></i>
                            </div>
                        </div>
                        <div class="w-100 my-8">
                            <div
                                class="w-full text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
                                style="backdrop-filter: blur(20px)"
                            >
                                <div class="mx-auto">
                                    <!-- aqui va el contenido dentro del glass -->
                                    <div class="mt-6">
                                        <!-- este el el badge de un error -->
                                        <div
                                            v-show="showErrorMessage"
                                            class="relative bg-red-100 border-t border-b text-red-700 px-4 py-3 rounded-xl mb-4"
                                        >
                                            <p class="font-bold">
                                                Error in the form
                                            </p>
                                            <p class="text-sm">
                                                {{ txtErrorMsg }}
                                            </p>
                                            <i
                                                class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                                                @click="
                                                    showErrorMessage = false
                                                "
                                            ></i>
                                        </div>
                                        <form @submit.prevent>
                                            <div v-if="registrado.logeado">
                                                <label
                                                    for="nickJugador"
                                                    class="block mb-2 text-2xl font-bold"
                                                    >Wellcome
                                                    {{ registrado.name }}</label
                                                >
                                            </div>
                                            <div v-else="registrado.logeado">
                                                <label
                                                    for="nickJugador"
                                                    class="block mb-2 text-xl font-bold"
                                                    >Wellcome Guest</label
                                                >
                                            </div>
                                            <div class="mt-6">
                                                <div
                                                    class="flex justify-between mb-2"
                                                >
                                                    <label
                                                        for="clave-acceso"
                                                        class="text-sm font-bold"
                                                        >access key</label
                                                    >
                                                    <a
                                                        @click.prevent="
                                                            showModalInfo = true
                                                        "
                                                        href="#"
                                                        class="text-sm focus:text-blue-500 hover:text-blue-500 hover:underline"
                                                        >Don't have the key?</a
                                                    >
                                                </div>

                                                <input
                                                    @focus="
                                                        showErrorMessage = false
                                                    "
                                                    v-model="txtPassword"
                                                    type="password"
                                                    name="clave-acceso"
                                                    id="clave-acceso"
                                                    placeholder="You must search for the key with the clues on the website."
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                                />
                                            </div>
                                            <div class="mt-6">
                                                <div
                                                    class="flex justify-between mb-2"
                                                >
                                                    <label
                                                        for="dificultad"
                                                        class="text-sm font-bold"
                                                        >Difficulty Level</label
                                                    >
                                                    <i
                                                        @click="
                                                            mostrarInfoDificultad = true
                                                        "
                                                        class="ph ph-info text-2xl"
                                                    ></i>
                                                </div>

                                                <select
                                                    @focus="
                                                        showErrorMessage = false
                                                    "
                                                    v-model="cmbDificultad"
                                                    name="dificultad"
                                                    id="dificultad"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                                >
                                                    option
                                                    <option value="Facil">
                                                        Beginner
                                                    </option>
                                                    <option value="Normal">
                                                        Medium
                                                    </option>
                                                    <option value="Dificil">
                                                        Advanced
                                                    </option>
                                                </select>
                                            </div>
                                            <div
                                                class="mt-6 flex justify-around"
                                            >
                                                <button
                                                    v-if="!visible"
                                                    @click="validar"
                                                    style="
                                                        backdrop-filter: blur(
                                                            20px
                                                        );
                                                    "
                                                    class="rounded-md bg-white bg-opacity-60 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                                                >
                                                    Start game
                                                </button>
                                                <button
                                                    v-if="!visible"
                                                    @click="logout"
                                                    style="
                                                        backdrop-filter: blur(
                                                            20px
                                                        );
                                                    "
                                                    class="rounded-md bg-white bg-opacity-60 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                                                >
                                                    Close Session
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer transparente -->
            <div class="w-100 p-3 m-6 md:hidden">
                <div
                    class="text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
                    style="backdrop-filter: blur(20px)"
                >
                    <div class="mx-auto">
                        <div>
                            <div class="text-black w-full h-25 p-4">
                                <div class="my-1">
                                    <span class="font-medium"
                                        >Colaboradores:</span
                                    >
                                    <span class=""
                                        >Alumnos de 2DW3A y dpto. Química</span
                                    >
                                </div>
                                <div class="my-1">
                                    <span class="font-medium">Email: </span>
                                    <span>alumnos@txurdinaga.eus</span>
                                </div>
                                <div class="my-1">
                                    <span class="font-medium">Telf: </span>
                                    <span>555-222-123</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ModalStartGame
                @close="inicioJuegoDesdeModal"
                :showModal="showModalStart"
                bgColor="bg-blue-500"
                titulo="Bienvenido al juego"
                textoBotonCerrar="Iniciar partida"
                ><strong
                    >Welcome to the game,
                    <span class="text-blue-900">{{
                        this.txtNick
                    }}</span></strong
                >
                <p>
                    You have the opportunity to prove that you are a true
                    chemist. chemist.
                </p>
                <p>
                    To do this, you must pass a series of tests that will lead
                    you to discover the final password and save to discover the
                    final password and save humanity.
                </p>
                <p>
                    You will have to use your skills and ingenuity to solve the
                    challenges that we challenges we propose you.
                </p>
                <p>
                    Remember, you only have 30 minutes, and every time you fail
                    a game, you will lose time from the game, you will lose time
                    off the clock depending on the difficulty you have chosen.
                    Cheer up, and good luck!
                </p></ModalStartGame
            >
            <ModalStartGame
                @close="hint.showModalHints = false"
                :showModal="hint.showModalHints"
                :bgColor="hint.bgHint"
                :titulo="hint.titulo"
                :texto="hint.descripcion"
            >
                <div @mouseover.prevent class="w-60 pb-6 relative">
                    <img :src="hint.srcGift" alt="" />
                </div>
            </ModalStartGame>
            <ModalStartGame
                @close="mostrarInfoDificultad = false"
                :showModal="mostrarInfoDificultad"
                bgColor="bg-blue-500"
                titulo="Informacion de la dificultad"
            >
                <p>
                    Based on the difficulty you choose, your timer will be
                    affected. will be affected.
                </p>
                <p>
                    To complete the game you will have 30 minutes, and for every
                    failure in one of the one of the tests, depending on the
                    difficulty, time will be deducted from your will be deducted
                    from the clock:
                </p>
                <p class="font-bold">Easy: 5 Minutes</p>

                <p class="font-bold">Medium: 7 Minutos</p>
                <p class="font-bold">Difficult: 12 Minutes</p>
                -->
            </ModalStartGame>
        </div>
        <!-------------------------------------------------------------------------------------------------------------------------------->

        <!-- component -->
        <div v-show="idioma.find((idioma) => idioma.estado)?.name === 'eu'">
            <div class="flex flex-col-reverse justify-center md:flex-row">
                <div
                    class="relative bg-cover lg:block lg:w-2/3 max-md:mx-8 max-md:rounded-2xl overflow-hidden"
                    style="background-image: url(/img/puerta.jpg)"
                >
                    <div
                        class="flex items-center h-96 md:h-full px-20 bg-gray-900 bg-opacity-75"
                    >
                        <div>
                            <h2 class="text-4xl font-bold text-white">
                                Zer zeukan Vialak?
                                <i
                                    class="ph ph-flask font-5xl"
                                    @click="
                                        showPass({
                                            descripcion:
                                                'JAJA, akats bat egin duzu, eta gogoratu, hau ez da probeta bat, matraz bat da.',
                                            titulo: 'Ez hain azkar',
                                            bgColor: 'bg-red-500',
                                            srcGift:
                                                'https://media.giphy.com/media/l0HlUxcWRsqROFYuk/giphy.gif',
                                        })
                                    "
                                    alt="matraz"
                                ></i>
                            </h2>

                            <p class="max-w-xl mt-3 text-gray-300 text-lg">
                                Sartu gure escape room eta ezagutu abenturen
                                mundu bat!
                            </p>
                        </div>

                        <i
                            class="absolute ph ph-test-tube lg:bottom-150 left-3 text-2xl"
                            @click="
                                showPass({
                                    titulo: 'Lortu duzu',
                                    bgColor: 'bg-green-500',
                                    descripcion: `Zorionak, ontzian etiketa bat aurkitu duzu. Honela dio: ${this.pass}`,
                                    srcGift:
                                        'https://media.giphy.com/media/PkoGC4SZK3DynYxlXy/giphy.gif',
                                })
                            "
                            alt="vial"
                        ></i>
                    </div>
                </div>

                <div
                    class="flex items-center w-full max-w-md px-6 mx-auto lg:w-1/3 mt-10 mb-12"
                >
                    <div class="flex-1">
                        <div class="text-center">
                            <h2 class="text-4xl font-bold text-center">
                                Jokorako sarbidea
                            </h2>
                            <!-- <img src="../assets/img/puerta.jpg" alt="" /> -->

                            <p class="my-5">
                                Idatzi goitizen bat zure aurrerapena eta
                                sailkapena gordetzeko, eta sailkapenak eta
                                sarbide pasahitza.
                            </p>
                            <!-- tarjeta -->

                            <div
                                v-show="showModalInfo"
                                id="tarjeta-info"
                                class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative"
                            >
                                <i class="ph ph-info text-2xl"></i>
                                <span class="text-left">
                                    Hona hemen zure lehen erronka, sakatu
                                    orrialdean ezkutatuta dagoen probeta
                                    orrialdean ezkutatuta dagoen hodia (begiratu
                                    behar duzu ondo) eta aurkitu nola aurki
                                    dezakezun sartzeko pasahitza
                                </span>
                                <i
                                    class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                                    @click="showModalInfo = false"
                                ></i>
                            </div>
                        </div>
                        <div class="w-100 my-8">
                            <div
                                class="w-full text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
                                style="backdrop-filter: blur(20px)"
                            >
                                <div class="mx-auto">
                                    <!-- aqui va el contenido dentro del glass -->
                                    <div class="mt-6">
                                        <!-- este el el badge de un error -->
                                        <div
                                            v-show="showErrorMessage"
                                            class="relative bg-red-100 border-t border-b text-red-700 px-4 py-3 rounded-xl mb-4"
                                        >
                                            <p class="font-bold">
                                                Errorea inprimakian
                                            </p>
                                            <p class="text-sm">
                                                {{ txtErrorMsg }}
                                            </p>
                                            <i
                                                class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                                                @click="
                                                    showErrorMessage = false
                                                "
                                            ></i>
                                        </div>
                                        <form @submit.prevent>
                                            <div v-if="registrado.logeado">
                                                <label
                                                    for="nickJugador"
                                                    class="block mb-2 text-2xl font-bold"
                                                    >Ongi Etorri
                                                    {{ registrado.name }}</label
                                                >
                                            </div>
                                            <div v-else="registrado.logeado">
                                                <label
                                                    for="nickJugador"
                                                    class="block mb-2 text-xl font-bold"
                                                    >Ongi etorri
                                                    Gonbidatua</label
                                                >
                                            </div>
                                            <div class="mt-6">
                                                <div
                                                    class="flex justify-between mb-2"
                                                >
                                                    <label
                                                        for="clave-acceso"
                                                        class="text-sm font-bold"
                                                        >sarbide-giltza</label
                                                    >
                                                    <a
                                                        @click.prevent="
                                                            showModalInfo = true
                                                        "
                                                        href="#"
                                                        class="text-sm focus:text-blue-500 hover:text-blue-500 hover:underline"
                                                        >Ez al duzu giltza?</a
                                                    >
                                                </div>

                                                <input
                                                    @focus="
                                                        showErrorMessage = false
                                                    "
                                                    v-model="txtPassword"
                                                    type="password"
                                                    name="clave-acceso"
                                                    id="clave-acceso"
                                                    placeholder="You must search for the key with the clues on the website."
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                                />
                                            </div>
                                            <div class="mt-6">
                                                <div
                                                    class="flex justify-between mb-2"
                                                >
                                                    <label
                                                        for="dificultad"
                                                        class="text-sm font-bold"
                                                        >Zailtasun Maila</label
                                                    >
                                                    <i
                                                        @click="
                                                            mostrarInfoDificultad = true
                                                        "
                                                        class="ph ph-info text-2xl"
                                                    ></i>
                                                </div>

                                                <select
                                                    @focus="
                                                        showErrorMessage = false
                                                    "
                                                    v-model="cmbDificultad"
                                                    name="dificultad"
                                                    id="dificultad"
                                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                                >
                                                    option
                                                    <option value="Facil">
                                                        Hasiberria
                                                    </option>
                                                    <option value="Normal">
                                                        Ertaina
                                                    </option>
                                                    <option value="Dificil">
                                                        Aurreratua
                                                    </option>
                                                </select>
                                            </div>
                                            <div
                                                class="mt-6 flex justify-around"
                                            >
                                                <button
                                                    v-if="!visible"
                                                    @click="validar"
                                                    style="
                                                        backdrop-filter: blur(
                                                            20px
                                                        );
                                                    "
                                                    class="rounded-md bg-white bg-opacity-60 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                                                >
                                                    Hasi jokoa
                                                </button>
                                                <button
                                                    v-if="!visible"
                                                    @click="logout"
                                                    style="
                                                        backdrop-filter: blur(
                                                            20px
                                                        );
                                                    "
                                                    class="rounded-md bg-white bg-opacity-60 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                                                >
                                                    Saioa itxi
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer transparente -->
                <div class="w-100 p-3 m-6 md:hidden">
                    <div
                        class="text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
                        style="backdrop-filter: blur(20px)"
                    >
                        <div class="mx-auto">
                            <div>
                                <div class="text-black w-full h-25 p-4">
                                    <div class="my-1">
                                        <span class="font-medium"
                                            >Colaboradores:</span
                                        >
                                        <span class=""
                                            >Alumnos de 2DW3A y dpto.
                                            Química</span
                                        >
                                    </div>
                                    <div class="my-1">
                                        <span class="font-medium">Email: </span>
                                        <span>alumnos@txurdinaga.eus</span>
                                    </div>
                                    <div class="my-1">
                                        <span class="font-medium">Telf: </span>
                                        <span>555-222-123</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ModalStartGame
                    @close="inicioJuegoDesdeModal"
                    :showModal="showModalStart"
                    bgColor="bg-blue-500"
                    titulo="Bienvenido al juego"
                    textoBotonCerrar="Iniciar partida"
                    ><strong
                        >Ongi etorri jokora,
                        <span class="text-blue-900">{{
                            this.txtNick
                        }}</span></strong
                    >
                    <p>
                        Benetako kimikaria zarela frogatzeko aukera duzu.
                        kimikaria.
                    </p>
                    <p>
                        Horretarako, azken pasahitza ezagutu eta gordetzera
                        eramango zaituzten proba batzuk gainditu behar dituzu
                        azken pasahitza ezagutzeko eta gizateria salbatzeko.
                    </p>
                    <p>
                        Zure gaitasunak eta asmamena erabili beharko dituzu guk
                        ditugun erronkak konpontzeko proposatzen dizkizugun
                        erronkak.
                    </p>
                    <p>
                        Gogoratu, 30 minutu baino ez dituzula, eta partida bat
                        huts egiten duzun bakoitzean, denbora galduko duzula
                        jokoan, denbora galduko duzu erlojua aukeratu duzun
                        zailtasunaren arabera. Animatu, eta zorte on!
                    </p></ModalStartGame
                >
                <ModalStartGame
                    @close="hint.showModalHints = false"
                    :showModal="hint.showModalHints"
                    :bgColor="hint.bgHint"
                    :titulo="hint.titulo"
                    :texto="hint.descripcion"
                >
                    <div @mouseover.prevent class="w-60 pb-6 relative">
                        <img :src="hint.srcGift" alt="" />
                    </div>
                </ModalStartGame>
                <ModalStartGame
                    @close="mostrarInfoDificultad = false"
                    :showModal="mostrarInfoDificultad"
                    bgColor="bg-blue-500"
                    titulo="Informacion de la dificultad"
                >
                    <p>
                        Aukeratzen duzun zailtasunaren arabera, zure
                        tenporizadorea eragina izango du. eragingo du.
                    </p>
                    <p>
                        Jokoa osatzeko 30 minutu izango dituzu, eta hutsegite
                        bakoitzeko probetako bat, zailtasunaren arabera, denbora
                        kenduko zaio zureari erlojutik kenduko da:
                    </p>
                    <p class="font-bold">Erraza: 5 minutu</p>

                    <p class="font-bold">Ertaina: 7 minutu</p>
                    <p class="font-bold">Zailtasuna: 12 minutu</p>
                    -->
                </ModalStartGame>
            </div>
        </div>
    </div>
</template>
<script>
import ModalStartGame from "../components/modals/ModalStartGame.vue";
import { useHelpStore } from "../store/help";
import { useLoginStore } from "../store/LoginStore";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useIdioma } from "../store/languages";
import { mapWritableState, mapActions } from "pinia";

export default {
    data() {
        return {
            showModalStart: false,
            txtNick: "",
            txtPassword: "",
            cmbDificultad: "",
            pass: "",
            showModalInfo: true,
            showErrorMessage: false,
            txtErrorMsg: "",
            mostrarInfoDificultad: false,
            hint: {
                showModalHints: false,
                bgHint: "bg-blue-500",
                titulo: "Bienvenido al juego",
                descripcion: "descripcion placeholder",
                srcGift: "",
            },
        };
    },
    components: { ModalStartGame, ModalHelp },
    methods: {
        validar() {
            if (!this.cmbDificultad) {
                this.txtErrorMsg = "Debes seleccionar una opción.";
                this.showErrorMessage = true;
                return;
            }
            if (this.txtPassword !== this.pass) {
                this.txtErrorMsg = "La clave de acceso no es correcta";
                this.showErrorMessage = true;
                return;
            }
            //llamamos a inicio del luego
            this.inicioJuego();
        },
        inicioJuego() {
            //guardamos las variable de inicio de sesion en el store de pinia
            if (this.registrado.logeado) {
                this.usuario.nick = this.registrado.name;
                this.usuario.dificultad = this.cmbDificultad;
                this.usuario.iniciado = true;
                this.usuario.id = this.registrado.id;
                console.log(this.usuario);
            } else {
                this.usuario.nick = "Anónimo";
                this.usuario.dificultad = this.cmbDificultad;
                this.usuario.iniciado = true;
            }
            //iniciamos los dos temporizadores

            //redirigimos a la pagina de inicio del juego desde el modal
            this.showModalStart = true;
        },
        inicioJuegoDesdeModal() {
            //al iniciar partida guardamos las variables de inicio,
            //y desde el modal, al  darle al boton, iniciamos los relojes y redirigimos a la pagina de inicio del juego
            //1.reloj para el ranking
            this.iniciarTemporizador();
            //2.reloj visual de la pagina
            this.iniciarCuentaAtras();
            this.$router.push("/startGame");
        },

        ...mapActions(useTemporizadorStore, [
            "iniciarTemporizador",
            "iniciarCuentaAtras",
        ]),
        ...mapActions(useIdioma, ["cambioIdioma"]),
        generatePass() {
            //this.pass = ""

            // genera la contraseña usando los siguientes caracteres
            const characters =
                "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            const charactersLength = characters.length;
            let counter = 0;

            while (counter < 5) {
                this.pass += characters.charAt(
                    Math.floor(Math.random() * charactersLength)
                );
                counter += 1;
            }
        },

        showPass(obj) {
            this.hint.showModalHints = true;
            this.hint.bgHint = obj.bgColor;
            this.hint.titulo = obj.titulo;
            this.hint.descripcion = obj.descripcion;
            this.hint.srcGift = obj.srcGift;
        },
        logout() {
            this.registrado.logeado = false;
            this.registrado.name = null;
            this.$router.push("/userlogin");
        },
    },
    computed: {
        ...mapWritableState(useLoginStore, ["usuario", "registrado"]),
        ...mapWritableState(useIdioma, ["idioma", "seleccionIdioma"]),
    },
    mounted() {
        this.generatePass();
    },
};
</script>
