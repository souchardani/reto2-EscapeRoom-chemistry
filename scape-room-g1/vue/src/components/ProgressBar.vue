<template>
    <div class="mb-8">
        <div class="mb-2 flex gap-2">
            <span
                :class="['mb-2', 'h-[15px]', 'flex-1', 'rounded-xl', 'shadow-lg', 'bg-clip-padding', 'bg-opacity-60', 'border',' border-gray-200',{'bg-white':store.inicio1,'bg-red-500':store.fallo1}]"
            ></span>
            <span
                :class="['mb-2', 'h-[15px]', 'flex-1', 'rounded-xl', 'shadow-lg', 'bg-clip-padding', 'bg-opacity-60', 'border', 'border-gray-200',{'bg-white':store.inicio2,'bg-red-500':store.fallo2}]"
            ></span>
            <span
                :class="['mb-2', 'h-[15px]', 'flex-1', 'rounded-xl', 'shadow-lg', 'bg-clip-padding', 'bg-opacity-60', 'border',' border-gray-200',{'bg-white':store.inicio3,'bg-red-500':store.fallo3}]"
            ></span>
            <span
                :class="['mb-2', 'h-[15px]', 'flex-1', 'rounded-xl', 'shadow-lg', 'bg-clip-padding', 'bg-opacity-60', 'border',' border-gray-200',{'bg-white':store.inicio4,'bg-red-500':store.fallo4}]"
            ></span>
            <span
                :class="['mb-2', 'h-[15px]', 'flex-1', 'rounded-xl', 'shadow-lg', 'bg-clip-padding', 'bg-opacity-60', 'border',' border-gray-200',{'bg-white':store.inicio5,'bg-red-500':store.fallo5}]"
            ></span>
        </div>
    </div>
</template>

<script setup>

import { useProgressBarStore } from '../store/progressBar';

const store = useProgressBarStore();

</script>
