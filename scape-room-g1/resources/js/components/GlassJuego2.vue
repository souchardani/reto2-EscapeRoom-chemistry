<template>
    <div
        class="cursor-grab text-center rounded-md mb-2 bg-white bg-opacity-60 h-12 grid place-content-center text-sm md:text-md font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline hover:bg-opacity-30 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
        style="backdrop-filter: blur(20px)"
    >
        <slot></slot>
    </div>
</template>

<script>
export default {};
</script>
