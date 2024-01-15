<template>
    <h1
        class="text-center font-medium p-5 py-1 text-4xl mb-4 drop-shadow-2xl md:text-5xl"
    >
        {{ texto }}
    </h1>
</template>
<script>
export default {
    props: ["texto"],
    name: "DescripcionJuego",
};
</script>
