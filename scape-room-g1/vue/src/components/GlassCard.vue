<template>
    <div class="w-100 py-3">
        <div
            class="text-justify relative px-8 py-5 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
            style="backdrop-filter: blur(20px)"
        >
            <div class="mx-auto">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>
