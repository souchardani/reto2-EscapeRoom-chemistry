<template>
        <div class="flex justify-center">
            <div
                v-show="help"
                id="tarjeta-info"
                class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative mr-2"
            >
                <i class="ph ph-info text-2xl"></i>
                <span class="text-left">Escribe la clave con los datos que has obtenido de las pruebas anteriores.</span>
                <i class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer" @click="hideTutorial"></i>
            </div>
            <div class="flex w-100 h-10">
                <GlassBtn @click="apagar()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                        <path d="M301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3zM425 167l55 55 55-55c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-55 55 55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-55-55-55 55c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l55-55-55-55c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0z" />
                    </svg>
                </GlassBtn>
                <GlassBtn class="ml-2" @click="encender()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                        <path d="M301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3zM412.6 181.5C434.1 199.1 448 225.9 448 256s-13.9 56.9-35.4 74.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C393.1 284.4 400 271 400 256s-6.9-28.4-17.7-37.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5z" />
                    </svg>
                </GlassBtn>
            </div>
        </div>
    <div class="container-fluid flex mx-4 p-4 justify-center items-center">
        <h1 class="text-4xl font-medium md:text-5xl">{{ this.cientifico }}</h1>
    </div>
    <div v-show="candadoCerrado">
        <div class="container-fluid flex justify-center items-center mx-4 p-4">
            <input
                type="text"
                id="1"
                maxlength="1"
                v-model="words[0].input"
                :class="[
                    'flex',
                    'w-[70px]',
                    'h-[70px]',
                    'md:w-[150px]',
                    'md:h-[150px]',
                    'xl:w-[200px]',
                    'xl:h-[200px]',
                    {
                        'bg-red-500': words[0].estado == 'rojo',
                        'bg-green-500': words[0].estado == 'verde',
                        'pointer-events-none': words[0].estado == 'verde',
                        'opacity-70': words[0].estado == 'verde',
                    },
                    { 'bg-white': words[0].estado == undefined },
                    'shadow-lg',
                    'rounded-3xl',
                    'bg-opacity-60',
                    'border',
                    'border-gray-200',
                    'mx-1',
                    'md:mx-2,',
                    'text-center',
                    'justify-center',
                    'items-center',
                    'my-auto',
                    'text-3xl',
                    'md:text-5xl',
                    'font-medium',
                ]"
                @keyup="
                    comprobarClave(0), $event.target.nextElementSibling.focus()
                "
            />
            <input
                type="text"
                id="2"
                maxlength="1"
                v-model="words[1].input"
                :class="[
                    'flex',
                    'w-[70px]',
                    'h-[70px]',
                    'md:w-[150px]',
                    'md:h-[150px]',
                    'xl:w-[200px]',
                    'xl:h-[200px]',
                    {
                        'bg-red-500': words[1].estado == 'rojo',
                        'bg-green-500': words[1].estado == 'verde',
                        'pointer-events-none': words[1].estado == 'verde',
                    },
                    { 'bg-white': words[0].estado == undefined },
                    'shadow-lg',
                    'rounded-3xl',
                    'bg-opacity-60',
                    'border',
                    'border-gray-200',
                    'mx-1',
                    'md:mx-2,',
                    'text-center',
                    'justify-center',
                    'items-center',
                    'my-auto',
                    'text-3xl',
                    'md:text-5xl',
                    'font-medium',
                ]"
                @keyup="
                    comprobarClave(1), $event.target.nextElementSibling.focus()
                "
            />
            <input
                type="text"
                id="3"
                maxlength="1"
                v-model="words[2].input"
                :class="[
                    'flex',
                    'w-[70px]',
                    'h-[70px]',
                    'md:w-[150px]',
                    'md:h-[150px]',
                    'xl:w-[200px]',
                    'xl:h-[200px]',
                    {
                        'bg-red-500': words[2].estado == 'rojo',
                        'bg-green-500': words[2].estado == 'verde',
                        'pointer-events-none': words[2].estado == 'verde',
                    },
                    { 'bg-white': words[0].estado == undefined },
                    'shadow-lg',
                    'rounded-3xl',
                    'bg-opacity-60',
                    'border',
                    'border-gray-200',
                    'mx-1',
                    'md:mx-2,',
                    'text-center',
                    'justify-center',
                    'items-center',
                    'my-auto',
                    'text-3xl',
                    'md:text-5xl',
                    'font-medium',
                ]"
                @keyup="
                    comprobarClave(2), $event.target.nextElementSibling.focus()
                "
            />
            <input
                type="text"
                id="4"
                maxlength="1"
                v-model="words[3].input"
                :class="[
                    'flex',
                    'w-[70px]',
                    'h-[70px]',
                    'md:w-[150px]',
                    'md:h-[150px]',
                    'xl:w-[200px]',
                    'xl:h-[200px]',
                    {
                        'bg-red-500': words[3].estado == 'rojo',
                        'bg-green-500': words[3].estado == 'verde',
                        'pointer-events-none': words[3].estado == 'verde',
                    },
                    { 'bg-white': words[0].estado == undefined },
                    'shadow-lg',
                    'rounded-3xl',
                    'bg-opacity-60',
                    'border',
                    'border-gray-200',
                    'mx-1',
                    'md:mx-2,',
                    'text-center',
                    'justify-center',
                    'items-center',
                    'my-auto',
                    'text-3xl',
                    'md:text-5xl',
                    'font-medium',
                ]"
                @keyup="
                    comprobarClave(3), $event.target.nextElementSibling.focus()
                "
            />
            <input
                type="text"
                id="5"
                maxlength="1"
                v-model="words[4].input"
                :class="[
                    'disabledCss',
                    'flex',
                    'w-[70px]',
                    'h-[70px]',
                    'md:w-[150px]',
                    'md:h-[150px]',
                    'xl:w-[200px]',
                    'xl:h-[200px]',
                    {
                        'bg-red-500': words[4].estado == 'rojo',
                        'bg-green-500': words[4].estado == 'verde',
                        'pointer-events-none': words[4].estado == 'verde',
                    },
                    { 'bg-white': words[0].estado == undefined },
                    'shadow-lg',
                    'rounded-3xl',
                    'bg-opacity-60',
                    'border',
                    'border-gray-200',
                    'mx-1',
                    'md:mx-2,',
                    'text-center',
                    'justify-center',
                    'items-center',
                    'my-auto',
                    'text-3xl',
                    'md:text-5xl',
                    'font-medium',
                ]"
                @keyup="comprobarClave(4)"
            />
            <!--empieza el eterno svg-->
            <svg
                fill="none"
                height="200"
                viewBox="0 0 32 32"
                width="200"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
            >
                <filter
                    id="a"
                    color-interpolation-filters="sRGB"
                    filterUnits="userSpaceOnUse"
                    height="11.9531"
                    width="13.7812"
                    x="7.40234"
                    y="2.27344"
                >
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend
                        in="SourceGraphic"
                        in2="BackgroundImageFix"
                        mode="normal"
                        result="shape"
                    />
                    <feColorMatrix
                        in="SourceAlpha"
                        result="hardAlpha"
                        type="matrix"
                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    />
                    <feOffset dx="1" />
                    <feGaussianBlur stdDeviation=".5" />
                    <feComposite
                        in2="hardAlpha"
                        k2="-1"
                        k3="1"
                        operator="arithmetic"
                    />
                    <feColorMatrix
                        type="matrix"
                        values="0 0 0 0 0.560784 0 0 0 0 0.556863 0 0 0 0 0.576471 0 0 0 1 0"
                    />
                    <feBlend
                        in2="shape"
                        mode="normal"
                        result="effect1_innerShadow_18_23657"
                    />
                </filter>
                <filter
                    id="b"
                    color-interpolation-filters="sRGB"
                    filterUnits="userSpaceOnUse"
                    height="12.9531"
                    width="12.75"
                    x="7.91797"
                    y="2.02344"
                >
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend
                        in="SourceGraphic"
                        in2="BackgroundImageFix"
                        mode="normal"
                        result="shape"
                    />
                    <feGaussianBlur
                        result="effect1_foregroundBlur_18_23657"
                        stdDeviation=".375"
                    />
                </filter>
                <filter
                    id="c"
                    color-interpolation-filters="sRGB"
                    filterUnits="userSpaceOnUse"
                    height="20.3438"
                    width="23.4375"
                    x="2.10547"
                    y="10.4609"
                >
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend
                        in="SourceGraphic"
                        in2="BackgroundImageFix"
                        mode="normal"
                        result="shape"
                    />
                    <feColorMatrix
                        in="SourceAlpha"
                        result="hardAlpha"
                        type="matrix"
                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    />
                    <feOffset dy="-.75" />
                    <feGaussianBlur stdDeviation=".375" />
                    <feComposite
                        in2="hardAlpha"
                        k2="-1"
                        k3="1"
                        operator="arithmetic"
                    />
                    <feColorMatrix
                        type="matrix"
                        values="0 0 0 0 0.898039 0 0 0 0 0.364706 0 0 0 0 0.423529 0 0 0 1 0"
                    />
                    <feBlend
                        in2="shape"
                        mode="normal"
                        result="effect1_innerShadow_18_23657"
                    />
                    <feColorMatrix
                        in="SourceAlpha"
                        result="hardAlpha"
                        type="matrix"
                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    />
                    <feOffset dx="-1" />
                    <feGaussianBlur stdDeviation=".375" />
                    <feComposite
                        in2="hardAlpha"
                        k2="-1"
                        k3="1"
                        operator="arithmetic"
                    />
                    <feColorMatrix
                        type="matrix"
                        values="0 0 0 0 1 0 0 0 0 0.772549 0 0 0 0 0.364706 0 0 0 1 0"
                    />
                    <feBlend
                        in2="effect1_innerShadow_18_23657"
                        mode="normal"
                        result="effect2_innerShadow_18_23657"
                    />
                    <feColorMatrix
                        in="SourceAlpha"
                        result="hardAlpha"
                        type="matrix"
                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    />
                    <feOffset dy="1" />
                    <feGaussianBlur stdDeviation=".375" />
                    <feComposite
                        in2="hardAlpha"
                        k2="-1"
                        k3="1"
                        operator="arithmetic"
                    />
                    <feColorMatrix
                        type="matrix"
                        values="0 0 0 0 1 0 0 0 0 0.843137 0 0 0 0 0.266667 0 0 0 1 0"
                    />
                    <feBlend
                        in2="effect2_innerShadow_18_23657"
                        mode="normal"
                        result="effect3_innerShadow_18_23657"
                    />
                    <feColorMatrix
                        in="SourceAlpha"
                        result="hardAlpha"
                        type="matrix"
                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    />
                    <feOffset dx=".75" />
                    <feGaussianBlur stdDeviation=".375" />
                    <feComposite
                        in2="hardAlpha"
                        k2="-1"
                        k3="1"
                        operator="arithmetic"
                    />
                    <feColorMatrix
                        type="matrix"
                        values="0 0 0 0 0.729412 0 0 0 0 0.478431 0 0 0 0 0.207843 0 0 0 1 0"
                    />
                    <feBlend
                        in2="effect3_innerShadow_18_23657"
                        mode="normal"
                        result="effect4_innerShadow_18_23657"
                    />
                </filter>
                <filter
                    id="d"
                    color-interpolation-filters="sRGB"
                    filterUnits="userSpaceOnUse"
                    height="18.4609"
                    width="7.375"
                    x="18.418"
                    y="10.4235"
                >
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend
                        in="SourceGraphic"
                        in2="BackgroundImageFix"
                        mode="normal"
                        result="shape"
                    />
                    <feGaussianBlur
                        result="effect1_foregroundBlur_18_23657"
                        stdDeviation=".5"
                    />
                </filter>
                <filter
                    id="e"
                    color-interpolation-filters="sRGB"
                    filterUnits="userSpaceOnUse"
                    height="12.2598"
                    width="7.96484"
                    x="9.82812"
                    y="14.373"
                >
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend
                        in="SourceGraphic"
                        in2="BackgroundImageFix"
                        mode="normal"
                        result="shape"
                    />
                    <feGaussianBlur
                        result="effect1_foregroundBlur_18_23657"
                        stdDeviation=".25"
                    />
                </filter>
                <filter
                    id="f"
                    color-interpolation-filters="sRGB"
                    filterUnits="userSpaceOnUse"
                    height="20.6234"
                    width="9.86562"
                    x="20.2539"
                    y="7.29844"
                >
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend
                        in="SourceGraphic"
                        in2="BackgroundImageFix"
                        mode="normal"
                        result="shape"
                    />
                    <feColorMatrix
                        in="SourceAlpha"
                        result="hardAlpha"
                        type="matrix"
                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    />
                    <feOffset dx=".35" dy="-.1" />
                    <feGaussianBlur stdDeviation=".3" />
                    <feComposite
                        in2="hardAlpha"
                        k2="-1"
                        k3="1"
                        operator="arithmetic"
                    />
                    <feColorMatrix
                        type="matrix"
                        values="0 0 0 0 0.686275 0 0 0 0 0.529412 0 0 0 0 0.784314 0 0 0 1 0"
                    />
                    <feBlend
                        in2="shape"
                        mode="normal"
                        result="effect1_innerShadow_18_23657"
                    />
                    <feColorMatrix
                        in="SourceAlpha"
                        result="hardAlpha"
                        type="matrix"
                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    />
                    <feOffset dx="-.25" dy=".25" />
                    <feGaussianBlur stdDeviation=".25" />
                    <feComposite
                        in2="hardAlpha"
                        k2="-1"
                        k3="1"
                        operator="arithmetic"
                    />
                    <feColorMatrix
                        type="matrix"
                        values="0 0 0 0 0.898039 0 0 0 0 0.886275 0 0 0 0 0.929412 0 0 0 1 0"
                    />
                    <feBlend
                        in2="effect1_innerShadow_18_23657"
                        mode="normal"
                        result="effect2_innerShadow_18_23657"
                    />
                    <feColorMatrix
                        in="SourceAlpha"
                        result="hardAlpha"
                        type="matrix"
                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    />
                    <feOffset dx=".15" dy=".15" />
                    <feGaussianBlur stdDeviation=".3" />
                    <feComposite
                        in2="hardAlpha"
                        k2="-1"
                        k3="1"
                        operator="arithmetic"
                    />
                    <feColorMatrix
                        type="matrix"
                        values="0 0 0 0 0.588235 0 0 0 0 0.568627 0 0 0 0 0.607843 0 0 0 1 0"
                    />
                    <feBlend
                        in2="effect2_innerShadow_18_23657"
                        mode="normal"
                        result="effect3_innerShadow_18_23657"
                    />
                </filter>
                <filter
                    id="g"
                    color-interpolation-filters="sRGB"
                    filterUnits="userSpaceOnUse"
                    height="9.22473"
                    width="9.08305"
                    x="20.7797"
                    y="7.40942"
                >
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend
                        in="SourceGraphic"
                        in2="BackgroundImageFix"
                        mode="normal"
                        result="shape"
                    />
                    <feGaussianBlur
                        result="effect1_foregroundBlur_18_23657"
                        stdDeviation=".125"
                    />
                </filter>
                <radialGradient
                    id="h"
                    cx="0"
                    cy="0"
                    gradientTransform="matrix(0 -4.84375 5.28858 0 13.793 7.74219)"
                    gradientUnits="userSpaceOnUse"
                    r="1"
                >
                    <stop offset=".530612" stop-color="#ab83c0" />
                    <stop offset="1" stop-color="#cbbbdc" stop-opacity="0" />
                </radialGradient>
                <radialGradient
                    id="i"
                    cx="0"
                    cy="0"
                    gradientTransform="matrix(-3.81892835 3.59374563 -4.93650113 -5.24582039 19.7235 4.67969)"
                    gradientUnits="userSpaceOnUse"
                    r="1"
                >
                    <stop offset=".215771" stop-color="#edecf3" />
                    <stop offset="1" stop-color="#edecf3" stop-opacity="0" />
                </radialGradient>
                <radialGradient
                    id="j"
                    cx="0"
                    cy="0"
                    gradientTransform="matrix(0 -7.125 5.16319 0 10.3747 12.7422)"
                    gradientUnits="userSpaceOnUse"
                    r="1"
                >
                    <stop offset="0" stop-color="#edecf3" />
                    <stop offset="1" stop-color="#edecf3" stop-opacity="0" />
                </radialGradient>
                <linearGradient
                    id="k"
                    gradientUnits="userSpaceOnUse"
                    x1="7.98047"
                    x2="14.918"
                    y1="14.2734"
                    y2="30.0547"
                >
                    <stop offset="0" stop-color="#ffc74e" />
                    <stop offset="1" stop-color="#f7864e" />
                </linearGradient>
                <radialGradient
                    id="l"
                    cx="0"
                    cy="0"
                    gradientTransform="matrix(-2.18751135 -2.40623625 5.60574354 -5.09618606 24.2305 30.0547)"
                    gradientUnits="userSpaceOnUse"
                    r="1"
                >
                    <stop offset="0" stop-color="#ff8650" />
                    <stop offset="1" stop-color="#ff8650" stop-opacity="0" />
                </radialGradient>
                <linearGradient
                    id="m"
                    gradientUnits="userSpaceOnUse"
                    x1="13.8242"
                    x2="13.8242"
                    y1="10.8984"
                    y2="12.3984"
                >
                    <stop offset="0" stop-color="#f3d04e" />
                    <stop offset="1" stop-color="#f3d04e" stop-opacity="0" />
                </linearGradient>
                <radialGradient
                    id="n"
                    cx="0"
                    cy="0"
                    gradientTransform="matrix(-1.37500271 1.87499255 -4.23499639 -3.10568246 24.4805 11.2109)"
                    gradientUnits="userSpaceOnUse"
                    r="1"
                >
                    <stop offset="0" stop-color="#fff760" />
                    <stop offset="1" stop-color="#fff760" stop-opacity="0" />
                </radialGradient>
                <linearGradient
                    id="o"
                    gradientUnits="userSpaceOnUse"
                    x1="22.1055"
                    x2="22.1055"
                    y1="11.4235"
                    y2="27.8844"
                >
                    <stop offset="0" stop-color="#be7f3b" />
                    <stop offset="1" stop-color="#bc553e" />
                </linearGradient>
                <radialGradient
                    id="p"
                    cx="0"
                    cy="0"
                    gradientTransform="matrix(-3.05638 0 0 -4.29803 25.1618 21.5687)"
                    gradientUnits="userSpaceOnUse"
                    r="1"
                >
                    <stop offset=".336121" stop-color="#763c16" />
                    <stop offset="1" stop-color="#763c16" stop-opacity="0" />
                </radialGradient>
                <linearGradient
                    id="q"
                    gradientUnits="userSpaceOnUse"
                    x1="16.9492"
                    x2="13.0742"
                    y1="21.836"
                    y2="21.836"
                >
                    <stop offset=".330645" stop-color="#d98a40" />
                    <stop offset="1" stop-color="#d98a40" stop-opacity="0" />
                </linearGradient>
                <linearGradient
                    id="r"
                    gradientUnits="userSpaceOnUse"
                    x1="10.6992"
                    x2="13.418"
                    y1="20.8985"
                    y2="20.8985"
                >
                    <stop offset="0" stop-color="#ffcd63" />
                    <stop offset="1" stop-color="#ffcd63" stop-opacity="0" />
                </linearGradient>
                <radialGradient
                    id="s"
                    cx="0"
                    cy="0"
                    gradientTransform="matrix(4.71484158 3.18749747 -4.38380386 6.48437869 11.2031 18.7735)"
                    gradientUnits="userSpaceOnUse"
                    r="1"
                >
                    <stop offset=".21669" stop-color="#564f80" />
                    <stop offset="1" stop-color="#473154" />
                </radialGradient>
                <linearGradient
                    id="t"
                    gradientUnits="userSpaceOnUse"
                    x1="25.1367"
                    x2="25.1367"
                    y1="19.3125"
                    y2="27.6719"
                >
                    <stop offset="0" stop-color="#cdc1de" />
                    <stop offset="1" stop-color="#c3b0db" />
                </linearGradient>
                <radialGradient
                    id="u"
                    cx="0"
                    cy="0"
                    gradientTransform="matrix(0 13.2235 -6.49293 0 25.1367 14.4484)"
                    gradientUnits="userSpaceOnUse"
                    r="1"
                >
                    <stop
                        offset=".934938"
                        stop-color="#c0a3e0"
                        stop-opacity="0"
                    />
                    <stop offset="1" stop-color="#b778e9" />
                </radialGradient>
                <linearGradient
                    id="v"
                    gradientUnits="userSpaceOnUse"
                    x1="29.6098"
                    x2="26.9682"
                    y1="8.84014"
                    y2="10.9678"
                >
                    <stop offset=".125595" stop-color="#ebe8f3" />
                    <stop offset="1" stop-color="#ebe8f3" stop-opacity="0" />
                </linearGradient>
                <g filter="url(#a)">
                    <path
                        d="m8.77734 14.2266v-5.56254c0-2.77005 2.24556-5.01562 5.01566-5.01562 2.77 0 5.0156 2.24557 5.0156 5.01562v5.56254"
                        stroke="#c2c2c6"
                        stroke-width="2.75"
                    />
                </g>
                <path
                    d="m8.77734 14.2266v-5.56254c0-2.77005 2.24556-5.01562 5.01566-5.01562 2.77 0 5.0156 2.24557 5.0156 5.01562v5.56254"
                    stroke="url(#h)"
                    stroke-width="2.75"
                />
                <g filter="url(#b)">
                    <path
                        d="m9.16797 14.2266v-5.75973c0-2.86825 2.29453-5.19343 5.12503-5.19343 2.8304 0 5.125 2.32518 5.125 5.19343v5.75973"
                        stroke="url(#i)"
                    />
                    <path
                        d="m9.16797 14.2266v-5.75973c0-2.86825 2.29453-5.19343 5.12503-5.19343 2.8304 0 5.125 2.32518 5.125 5.19343v5.75973"
                        stroke="url(#j)"
                    />
                </g>
                <g filter="url(#c)">
                    <rect
                        fill="url(#k)"
                        height="18.8438"
                        rx="3"
                        width="21.9375"
                        x="2.85547"
                        y="11.2109"
                    />
                </g>
                <rect
                    fill="url(#l)"
                    height="18.8438"
                    rx="3"
                    width="21.9375"
                    x="2.85547"
                    y="11.2109"
                />
                <rect
                    fill="url(#m)"
                    height="18.8438"
                    rx="3"
                    width="21.9375"
                    x="2.85547"
                    y="11.2109"
                />
                <rect
                    fill="url(#n)"
                    height="18.8438"
                    rx="3"
                    width="21.9375"
                    x="2.85547"
                    y="11.2109"
                />
                <g filter="url(#d)">
                    <path
                        d="m19.4904 11.4235c-.0476.2662-.0724.5403-.0724.8203 0 1.9244 1.1734 3.5748 2.8437 4.2747v2.8416c0 .2075.0807.407.225.5562l.4186.4327c.1354.1399.208.329.201.5236-.0056.1571-.0628.3081-.1627.4295l-.1996.2426c-.0997.1211-.1542.2731-.1542.4299 0 .154.0526.3034.149.4235l.1952.2433c.1059.132.1637.2962.1637.4654 0 .2069-.0862.4044-.2379.5452l-.3422.3174c-.1632.1514-.2559.3639-.2559.5865v1.5316c0 .9924.8045 1.7969 1.7969 1.7969.247 0 .4824-.0498.6966-.14.0249-.1554.0378-.3148.0378-.4772v-12.8437c0-1.6569-.6494-2.486-2.3063-2.486z"
                        fill="url(#o)"
                    />
                    <path
                        d="m19.4904 11.4235c-.0476.2662-.0724.5403-.0724.8203 0 1.9244 1.1734 3.5748 2.8437 4.2747v2.8416c0 .2075.0807.407.225.5562l.4186.4327c.1354.1399.208.329.201.5236-.0056.1571-.0628.3081-.1627.4295l-.1996.2426c-.0997.1211-.1542.2731-.1542.4299 0 .154.0526.3034.149.4235l.1952.2433c.1059.132.1637.2962.1637.4654 0 .2069-.0862.4044-.2379.5452l-.3422.3174c-.1632.1514-.2559.3639-.2559.5865v1.5316c0 .9924.8045 1.7969 1.7969 1.7969.247 0 .4824-.0498.6966-.14.0249-.1554.0378-.3148.0378-.4772v-12.8437c0-1.6569-.6494-2.486-2.3063-2.486z"
                        fill="url(#p)"
                    />
                </g>
                <g filter="url(#e)" stroke-width="1.75">
                    <path
                        d="m15.2227 20.5478c.7191-.4642 1.1953-1.2727 1.1953-2.1923 0-1.4401-1.1674-2.6075-2.6075-2.6075-1.44 0-2.6074 1.1674-2.6074 2.6075 0 .9312.4882 1.7485 1.2227 2.2097v3.2942c0 .7723.6261 1.3984 1.3984 1.3984.7724 0 1.3985-.6261 1.3985-1.3984z"
                        stroke="url(#q)"
                    />
                    <path
                        d="m15.2227 20.5478c.7191-.4642 1.1953-1.2727 1.1953-2.1923 0-1.4401-1.1674-2.6075-2.6075-2.6075-1.44 0-2.6074 1.1674-2.6074 2.6075 0 .9312.4882 1.7485 1.2227 2.2097v3.2942c0 .7723.6261 1.3984 1.3984 1.3984.7724 0 1.3985-.6261 1.3985-1.3984z"
                        stroke="url(#r)"
                    />
                </g>
                <path
                    d="m15.2227 20.5478c.7191-.4642 1.1953-1.2727 1.1953-2.1923 0-1.4401-1.1674-2.6075-2.6075-2.6075-1.44 0-2.6074 1.1674-2.6074 2.6075 0 .9312.4882 1.7485 1.2227 2.2097v3.2942c0 .7723.6261 1.3984 1.3984 1.3984.7724 0 1.3985-.6261 1.3985-1.3984z"
                    fill="url(#s)"
                />
                <g filter="url(#f)">
                    <path
                        clip-rule="evenodd"
                        d="m26.9414 16.2994c1.6621-.7036 2.8281-2.3497 2.8281-4.2682 0-2.55858-2.0741-4.63276-4.6328-4.63276-2.5586 0-4.6328 2.07418-4.6328 4.63276 0 1.9245 1.1734 3.5749 2.8438 4.2748v2.8415c0 .2076.0806.4071.225.5563l.4185.4326c.1354.14.208.329.2011.5236-.0057.1572-.0628.3081-.1628.4296l-.1996.2426c-.0996.1211-.1541.2731-.1541.4299 0 .154.0525.3034.1489.4234l.1953.2434c.1059.132.1636.2961.1636.4654 0 .2069-.0862.4044-.2379.5451l-.3421.3175c-.1632.1514-.2559.3639-.2559.5865v1.5316c0 .9924.8045 1.7969 1.7968 1.7969.9924 0 1.7969-.8045 1.7969-1.7969zm-.7656-6.66659c0 .57389-.4652 1.03909-1.0391 1.03909-.5738 0-1.039-.4652-1.039-1.03909 0-.57386.4652-1.03906 1.039-1.03906.5739 0 1.0391.4652 1.0391 1.03906z"
                        fill="url(#t)"
                        fill-rule="evenodd"
                    />
                </g>
                <path
                    clip-rule="evenodd"
                    d="m26.9414 16.2994c1.6621-.7036 2.8281-2.3497 2.8281-4.2682 0-2.55858-2.0741-4.63276-4.6328-4.63276-2.5586 0-4.6328 2.07418-4.6328 4.63276 0 1.9245 1.1734 3.5749 2.8438 4.2748v2.8415c0 .2076.0806.4071.225.5563l.4185.4326c.1354.14.208.329.2011.5236-.0057.1572-.0628.3081-.1628.4296l-.1996.2426c-.0996.1211-.1541.2731-.1541.4299 0 .154.0525.3034.1489.4234l.1953.2434c.1059.132.1636.2961.1636.4654 0 .2069-.0862.4044-.2379.5451l-.3421.3175c-.1632.1514-.2559.3639-.2559.5865v1.5316c0 .9924.8045 1.7969 1.7968 1.7969.9924 0 1.7969-.8045 1.7969-1.7969zm-.7656-6.66659c0 .57389-.4652 1.03909-1.0391 1.03909-.5738 0-1.039-.4652-1.039-1.03909 0-.57386.4652-1.03906 1.039-1.03906.5739 0 1.0391.4652 1.0391 1.03906z"
                    fill="url(#u)"
                    fill-rule="evenodd"
                />
                <g filter="url(#g)">
                    <ellipse
                        cx="25.3213"
                        cy="12.0218"
                        rx="4.09153"
                        ry="4.16238"
                        stroke="url(#v)"
                        stroke-width=".4"
                    />
                </g>
            </svg>
        </div>
    </div>
    <div
        v-show="candadoAbierto"
        class="container-fluid flex justify-center items-center mx-4 p-4"
    >
        <svg
            height="200"
            width="200"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 36 36"
        >
            <path
                fill="#AAB8C2"
                d="M18 0c-4.612 0-8.483 3.126-9.639 7.371l3.855 1.052C12.91 5.876 15.233 4 18 4c3.313 0 6 2.687 6 6v10h4V10c0-5.522-4.477-10-10-10z"
            />
            <path
                fill="#FFAC33"
                d="M31 32c0 2.209-1.791 4-4 4H9c-2.209 0-4-1.791-4-4V20c0-2.209 1.791-4 4-4h18c2.209 0 4 1.791 4 4v12z"
            />
        </svg>
    </div>
    <unsuccess v-bind:mostrar="mostrar" @clicked="closeModal"></unsuccess>
</template>
<script>
import { useFinalyWord } from "../store/finalyWord";
import { useProgressBarStore } from "../store/progressBar";
import { mapWritableState, mapActions } from "pinia";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useLoginStore } from "../store/LoginStore";
import GlassBtn from "../components/GlassBtn.vue";
import unsuccess from "../components/modals/unsuccess.vue";
import axios from "axios";
import JSConfetti from "js-confetti";
export default {
    data() {
        return {
            //esta variable es el nombre el cientifico que daremos como pista
            pista: "", //esta variable es la pista completa que tienen que resolver
            words: [
                { input: "", estado: "" },
                { input: "", estado: "" },
                { input: "", estado: "" },
                { input: "", estado: "" },
                { input: "", estado: "" },
            ],
            candadoAbierto: false,
            candadoCerrado: true,
            estado: true,
            contador: 0,
            mostrar: false,
            aciertos: 0,
            descontarTiempo: 0,
            nuevotiempo: 0,
            audioAcertado:new Audio('/sounds/1200.mp3'),
            audioIncorrecto:new Audio('/sounds/incorrect-cbt-sound.mp3'),
            aplausos:new Audio('/sounds/claps-44774.mp3'),
            fail:new Audio('/sounds/fail-144746.mp3'),
        };
    },
    methods: {
        // tutoriales y sonidos
        resetData() {
            this.help = true;
        },

        hideTutorial() {
            this.help = false;
        },

        apagar(){
            this.audioAcertado.muted=true;
            this.audioIncorrecto.muted=true;
            this.aplausos.muted=true;
            this.fail.muted=true;
        },
        encender(){
            this.audioAcertado.muted=false;
            this.audioIncorrecto.muted=false;
            this.aplausos.muted=false;
            this.fail.muted=false;
        },

        comprobarClave(indice) {
            if (this.words[indice].input == "") {
                this.words[indice].estado = "";
            } else {
                if (
                    this.words[indice].input.toLocaleUpperCase() ===
                    this.pista[indice]
                ) {
                    //******ES UN ACIERTO */
                    this.words[indice].estado = "verde";
                    this.audioAcertado.play();
                    this.aciertos++;
                    this.compruebaAciertos(this.aciertos);
                } else if (this.words[indice].input != this.pista[indice]) {
                    this.words[indice].estado = "rojo";
                    this.audioIncorrecto.play();
                    this.contador++;
                    this.marcaError(this.contador);
                    this.compruebafallo(this.contador, this.words);
                }
            }
        },
        async addPlayerToRanking() {
            try {
                await axios.post("http://44.196.190.239/api/addToRanking", {
                    nick: this.usuario.nick,
                    dificultad: this.usuario.dificultad,
                    tiempo: this.nuevotiempo,
                });
            } catch (error) {
                console.log(error);
            }
        },
        compruebafallo(contador, array) {
            if (contador == 5) {
                this.mostrar = true;
                this.fail.play();
                this.descontarTiempo = this.saberTiempoXdificultad(
                    this.usuario.dificultad
                );
                this.reduceTime(this.descontarTiempo);
                this.resetState();
                this.contador = 0;
                array.forEach((element) => {
                    element.input = "";
                    element.estado = "";
                });
            }
        },
        focusNext(e) {
            const inputs = Array.from(
                e.target.form.querySelectorAll('input[type="text"]')
            );
            const index = inputs.indexOf(e.target);

            if (index < inputs.length) {
                inputs[index + 1].focus();
            }
        },
        closeModal() {
            this.mostrar = false;
        },
        async compruebaAciertos(aciertos) {
            if (aciertos == 5) {
                this.candadoAbierto=true;
                this.candadoCerrado=false;
                this.aplausos.play();
                this.nuevotiempo = this.getTiempoLaravel();
                await this.addPlayerToRanking();
                //animacion cuando completas
                const jsConfetti = new JSConfetti();
                jsConfetti.addConfetti({
                    emojis: ["🌈", "⚡️", "💥", "✨", "💫", "🌸"],
                    confettiColors: [
                        "#ff0a54",
                        "#ff477e",
                        "#ff7096",
                        "#ff85a1",
                        "#fbb1bd",
                        "#f9bec7",
                    ],
                    confettiRadius: 6,
                    confettiNumber: 500,
                });

                setTimeout(() => {
                    this.$router.push("Ranking");
                }, 1500);
            }
        },
        ...mapActions(useProgressBarStore, [
            "insertaFallo1",
            "insertaFallo2",
            "insertaFallo3",
            "insertaFallo4",
            "insertaFallo5",
            "incrementafallo",
            "marcaError",
            "resetState",
        ]),
        ...mapActions(useTemporizadorStore, [
            "reduceTime",
            "saberTiempoXdificultad",
            "getTiempoLaravel",
        ]),
    },
    computed: {
        ...mapWritableState(useTemporizadorStore, ["totalTime"]),
        ...mapWritableState(useFinalyWord, ["cientifico", "clave"]),
        ...mapWritableState(useLoginStore, ["usuario"]),
    },
    components: {
        unsuccess,
        GlassBtn
    },
    mounted() {
        this.pista = this.clave;
        this.resetData();
    },
};
</script>

<style scoped></style>
