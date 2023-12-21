<template>
    <div class="w-100 py-3 my-6">
        <div
            class="text-justify relative px-8 py-7 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
            style="backdrop-filter: blur(20px)"
        >
            <div class="mx-auto font-medium text-center">
                {{ texto }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["texto"],
    name: "DescripcionJuego",
};
</script>
