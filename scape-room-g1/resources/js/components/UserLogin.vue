<template>
    <div
        class="bg-white opacity-60 rounded-xl p-8 w-[350px] flex flex-col items-center"
    >
        <h1 class="text-3xl font-bold">Ya estas registrado?</h1>
        <div class="flex flex-col w-96 p-5">
            <div class="flex flex-col my-5">
                <label for="nombre" class="font-semibold text-xl my-2 mx-4"
                    >Nombre :</label
                >
                <input
                    type="text"
                    placeholder="Escribe aqui tu nombre o nick"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
            </div>
            <div class="flex flex-col my-5">
                <label for="password" class="font-semibold text-xl my-2 mx-4"
                    >PassWord :</label
                >
                <input
                    type="password"
                    name=""
                    id=""
                    placeholder="Escribe aqui tu password"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
            </div>
        </div>
        <button class="bg-gray-400 p-4 rounded-xl hover:bg-gray-300 font-bold">
            Login
        </button>
    </div>
</template>
<script>
export default {};
</script>
