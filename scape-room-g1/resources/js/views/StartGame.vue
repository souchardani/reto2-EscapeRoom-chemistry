<template>
    <div
        class="container-fluid backdrop-blur-lg lg:pt-6 px-8"
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
        <div class="flex justify-end">
            <BtnSalir></BtnSalir>
        </div>

        <h1
            class="text-center font-medium text-5xl md:text-4xl mb-5 drop-shadow-2xl lg:pb-2"
        >
            Scape Room
        </h1>
        <button @click="completarJuegos()">Completar todos los juegos</button>
        <h2></h2>
        <div class="flex">
            <!-- <button @click="storeTemporizador.reiniciarEstadoTiempo()">
                resetear contador
            </button> -->
            <div class="w-100 mx-auto md:w-100">
                <div class="relative">
                    <img
                        :src="'/img/labsharp.jpg'"
                        class="lg:w-[80vw] rounded-2xl lg:h-[90vh]"
                    />
                    <!-- reloj -->
                    <div
                        class="bottom-[300px] md:bottom-[600px] m-auto w-4/5 md:w-1/2 text-justify relative px-8 py-2 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-30 border border-gray-200 mb-3"
                        style="backdrop-filter: blur(20px)"
                    >
                        <h1
                            class="text-center font-medium text-2xl md:text-4xl pb-2 drop-shadow-2xl text-red-500"
                        >
                            Te quedan {{ storeTemporizador.minutes }}:{{
                                storeTemporizador.seconds
                            }}
                        </h1>
                    </div>
                    <router-link :to="!store.juego1 ? '/juego1' : ''">
                        <button
                            @click="handleModal(store.juego1)"
                            style="backdrop-filter: blur(20px)"
                            :class="[
                                'bg-green-400',
                                'flex',
                                'absolute',
                                'bottom-[110px]',
                                'left-[110px]',
                                'grow',
                                'rounded-2xl',
                                'bg-opacity-60',
                                'px-3.5',
                                'py-2.5',
                                'mb-8',
                                'text-sm',
                                'font-semibold',
                                'text-gray-900',
                                'shadow-sm',
                                'hover:bg-gray-200',
                                'focus-visible:outline',
                                'focus-visible:outline-2',
                                'focus-visible:outline-offset-2',
                                'focus-visible:outline-white',
                                'md:bottom-[200px]',
                                'md:left-[200px]',
                                'lg:bottom-[150px]',
                                'lg:left-[390px]',
                            ]"
                        >
                            <i
                                ><svg
                                    ref="juego1"
                                    :class="{ check: store.juego1 }"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 16 12"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="4"
                                        d="M1 5.917 5.724 10.5 15 1.5"
                                    /></svg></i
                            ><span>1</span>
                        </button>
                    </router-link>
                    <router-link
                        :to="store.juego4 ? '/juego5' : ''"
                        v-show="store.juego4"
                    >
                        <button
                            :class="[
                                'hover:scale-150',
                                'flex',
                                'absolute',
                                'bottom-[110px]',
                                'left-[110px]',
                                'grow',
                                'rounded-2xl',

                                'px-3.5',
                                'py-2.5',
                                'mb-8',
                                'text-sm',
                                'font-semibold',

                                'md:bottom-[200px]',
                                'md:left-[200px]',
                                'lg:bottom-[320px]',
                                'lg:left-[570px]',
                            ]"
                        >
                            <span
                                ><svg
                                    fill="none"
                                    height="80"
                                    viewBox="0 0 32 32"
                                    width="80"
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
                                        <feFlood
                                            flood-opacity="0"
                                            result="BackgroundImageFix"
                                        />
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
                                        <feFlood
                                            flood-opacity="0"
                                            result="BackgroundImageFix"
                                        />
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
                                        <feFlood
                                            flood-opacity="0"
                                            result="BackgroundImageFix"
                                        />
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
                                        <feFlood
                                            flood-opacity="0"
                                            result="BackgroundImageFix"
                                        />
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
                                        <feFlood
                                            flood-opacity="0"
                                            result="BackgroundImageFix"
                                        />
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
                                        <feFlood
                                            flood-opacity="0"
                                            result="BackgroundImageFix"
                                        />
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
                                        <feFlood
                                            flood-opacity="0"
                                            result="BackgroundImageFix"
                                        />
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
                                        <stop
                                            offset=".530612"
                                            stop-color="#ab83c0"
                                        />
                                        <stop
                                            offset="1"
                                            stop-color="#cbbbdc"
                                            stop-opacity="0"
                                        />
                                    </radialGradient>
                                    <radialGradient
                                        id="i"
                                        cx="0"
                                        cy="0"
                                        gradientTransform="matrix(-3.81892835 3.59374563 -4.93650113 -5.24582039 19.7235 4.67969)"
                                        gradientUnits="userSpaceOnUse"
                                        r="1"
                                    >
                                        <stop
                                            offset=".215771"
                                            stop-color="#edecf3"
                                        />
                                        <stop
                                            offset="1"
                                            stop-color="#edecf3"
                                            stop-opacity="0"
                                        />
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
                                        <stop
                                            offset="1"
                                            stop-color="#edecf3"
                                            stop-opacity="0"
                                        />
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
                                        <stop
                                            offset="1"
                                            stop-color="#ff8650"
                                            stop-opacity="0"
                                        />
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
                                        <stop
                                            offset="1"
                                            stop-color="#f3d04e"
                                            stop-opacity="0"
                                        />
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
                                        <stop
                                            offset="1"
                                            stop-color="#fff760"
                                            stop-opacity="0"
                                        />
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
                                        <stop
                                            offset=".336121"
                                            stop-color="#763c16"
                                        />
                                        <stop
                                            offset="1"
                                            stop-color="#763c16"
                                            stop-opacity="0"
                                        />
                                    </radialGradient>
                                    <linearGradient
                                        id="q"
                                        gradientUnits="userSpaceOnUse"
                                        x1="16.9492"
                                        x2="13.0742"
                                        y1="21.836"
                                        y2="21.836"
                                    >
                                        <stop
                                            offset=".330645"
                                            stop-color="#d98a40"
                                        />
                                        <stop
                                            offset="1"
                                            stop-color="#d98a40"
                                            stop-opacity="0"
                                        />
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
                                        <stop
                                            offset="1"
                                            stop-color="#ffcd63"
                                            stop-opacity="0"
                                        />
                                    </linearGradient>
                                    <radialGradient
                                        id="s"
                                        cx="0"
                                        cy="0"
                                        gradientTransform="matrix(4.71484158 3.18749747 -4.38380386 6.48437869 11.2031 18.7735)"
                                        gradientUnits="userSpaceOnUse"
                                        r="1"
                                    >
                                        <stop
                                            offset=".21669"
                                            stop-color="#564f80"
                                        />
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
                                        <stop
                                            offset=".125595"
                                            stop-color="#ebe8f3"
                                        />
                                        <stop
                                            offset="1"
                                            stop-color="#ebe8f3"
                                            stop-opacity="0"
                                        />
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
                                    </g></svg
                            ></span>
                        </button>
                    </router-link>
                    <router-link
                        :to="store.juego1 && !store.juego2 ? '/juego2' : ''"
                    >
                        <button
                            @click="handleModal(store.juego2, store.juego1)"
                            ref="juego2"
                            style="backdrop-filter: blur(20px)"
                            :class="[
                                {
                                    // isDisabled: store.activarJuego2,
                                    'bg-red-400': !store.juego1,
                                    'bg-green-400':
                                        store.juego1 || store.juego2,
                                },
                                'flex',
                                'absolute',
                                'bottom-20',
                                'right-20',
                                'grow',
                                'rounded-2xl',
                                'bg-opacity-60',
                                'px-3.5',
                                'py-2.5',
                                'mb-8',
                                'text-sm',
                                'font-semibold',
                                'text-gray-900',
                                'shadow-sm',
                                'hover:bg-gray-200',
                                'focus-visible:outline',
                                'focus-visible:outline-2',
                                'focus-visible:outline-offset-2',
                                'focus-visible:outline-white',
                                'md:bottom-[300px]',
                                'lg:bottom-[400px]',
                            ]"
                        >
                            <i
                                ><svg
                                    :class="{
                                        check: store.juego2,
                                    }"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 16 12"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="4"
                                        d="M1 5.917 5.724 10.5 15 1.5"
                                    /></svg
                            ></i>
                            <span>2</span>
                        </button>
                    </router-link>
                    <router-link
                        :to="store.juego2 && !store.juego3 ? '/juego3' : ''"
                    >
                        <button
                            @click="handleModal(store.juego3, store.juego2)"
                            ref="juego3"
                            style="backdrop-filter: blur(20px)"
                            :class="[
                                {
                                    // 'pointer-events-none': store.activarJuego3,
                                    'bg-red-400': !store.juego2,
                                    'bg-green-400':
                                        store.juego2 || store.juego3,
                                },
                                'flex',
                                'absolute',
                                'bottom-32',
                                'left-2',
                                'grow',
                                'rounded-2xl',
                                'bg-opacity-60',
                                'px-3.5',
                                'py-2.5',
                                'mb-8',
                                'text-sm',
                                'font-semibold',
                                'text-gray-900',
                                'shadow-sm',
                                'hover:bg-gray-200',
                                'focus-visible:outline',
                                'focus-visible:outline-2',
                                'focus-visible:outline-offset-2',
                                'focus-visible:outline-white',
                                'md:bottom-72',
                                'lg:bottom-[300px]',
                            ]"
                        >
                            <i
                                ><svg
                                    :class="{ check: store.juego3 }"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 16 12"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="4"
                                        d="M1 5.917 5.724 10.5 15 1.5"
                                    /></svg
                            ></i>
                            <span>3</span>
                        </button>
                    </router-link>
                    <router-link
                        :to="store.juego3 && !store.juego4 ? '/juego4' : ''"
                    >
                        <button
                            @click="handleModal(store.juego3, store.juego4)"
                            ref="juego4"
                            style="backdrop-filter: blur(20px)"
                            :class="[
                                {
                                    'bg-red-400': !store.juego3,
                                    'bg-green-400':
                                        store.juego3 || store.juego4,
                                },
                                'flex',
                                'absolute',

                                'bottom-32',
                                'right-32',
                                'grow',
                                'rounded-2xl',
                                'bg-opacity-60',
                                'px-3.5',
                                'py-2.5',
                                'mb-8',
                                'text-sm',
                                'font-semibold',
                                'text-gray-900',
                                'shadow-sm',
                                'hover:bg-gray-200',
                                'focus-visible:outline',
                                'focus-visible:outline-2',
                                'focus-visible:outline-offset-2',
                                'focus-visible:outline-white',
                                'md:bottom-36',
                                'md:right-44',
                                'lg:right-[300px]',
                                'lg:bottom-[210px]',
                            ]"
                        >
                            <i
                                ><svg
                                    :class="{ check: store.juego4 }"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 16 12"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="4"
                                        d="M1 5.917 5.724 10.5 15 1.5"
                                    /></svg
                            ></i>
                            <span>4</span>
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
        <!--footer-->
        <div class="w-100 py-2 max-sm:max-w-xl max-sm:mx-auto max-sm:m-6">
            <!-- aqui va el footer -->
            <Footer></Footer>
        </div>
        <!--modal-->
        <ModalStartGame
            @close="showModal = false"
            :showModal="showModal"
            :bgColor="background"
            :titulo="titulo"
            :texto="descripcion"
        ></ModalStartGame>
    </div>
    <ModalFailGame :showModal="showModalTemp" @cerrar-modal="closeModalTime" />
</template>

<script setup>
import Footer from "../components/Footer.vue";
import BtnSalir from "../components/BtnSalir.vue";
import { useCheckStore } from "../store/checkState";
import { useLoginStore } from "../store/LoginStore";
import Reloj from "../components/Reloj.vue";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { mapWritableState, mapActions } from "pinia";
import { watch, ref } from "vue";
import { reactive, computed } from "vue";
import ModalStartGame from "../components/modals/ModalStartGame.vue";
import ModalFailGame from "../components/modals/ModalFailGame.vue";
import { useRoute, useRouter } from "vue-router";
import { useProgressBarStore } from "../store/progressBar";

const store = useCheckStore();
const storeLogin = useLoginStore();
const storeTemporizador = useTemporizadorStore();
const ProgressBarStore = useProgressBarStore();

const titulo = ref();
const descripcion = ref();
const background = ref();

const obtenerRojo = (juegoActual, juegoPrevio) => {
    if (juegoPrevio) {
        return false;
    } else {
        return true;
    }
};

const showModalTemp = ref(storeTemporizador.showModal);

watch(
    () => storeTemporizador.showModal,
    (newValue) => {
        showModalTemp.value = newValue;
    }
);

const router = useRouter();

const closeModalTime = () => {
    //reinicamos los valores de usuario
    storeLogin.resetUser();
    //ponemos el tiempo final de nuevo a 0
    storeTemporizador.reiniciarEstadoTiempo();
    //reiciamos el setState
    store.resetSetState();
    ProgressBarStore.resetState();
    console.log("usuario luego de reiniciar: " + storeLogin.getUsuario());
    router.push("/login");
};

const showModal = ref(false);

const completarJuegos = () => {
    store.juego2 = true;
    store.juego3 = true;
    store.juego4 = true;
};

const handleModal = (terminado, juegoPrevio = null) => {
    if (juegoPrevio == null) {
        if (terminado) {
            titulo.value = "Juego completado";
            descripcion.value =
                "Ya has completado este juego, no puedes volver a entrar";
            background.value = "bg-green-400";
            showModal.value = !showModal.value;
        }
    } else {
        if (terminado) {
            titulo.value = "Juego completado";
            descripcion.value =
                "Ya has completado este juego, no puedes volver a entrar";
            background.value = "bg-green-400";
            showModal.value = !showModal.value;
        } else if (!juegoPrevio) {
            titulo.value = "Juego no disponible";
            descripcion.value =
                "Para poder acceder a este juego, debes completar el anterior";
            background.value = "bg-red-400";
            showModal.value = !showModal.value;
        }
    }
};
</script>
<style scoped>
.check {
    width: 3rem;
    height: 1rem;
    color: rgb(89, 240, 89);
}
</style>
