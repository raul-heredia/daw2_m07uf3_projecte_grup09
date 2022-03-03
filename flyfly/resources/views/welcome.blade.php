@extends('disseny')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html,
            body {
                margin: 0;
                height: 100%;
                overflow: hidden
            }

            html {
                line-height: 1.15;
                -webkit-text-size-adjust: 100%
            }

            body {
                margin: 0
            }

            a {
                background-color: transparent
            }

            [hidden] {
                display: none
            }

            html {
                font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
                line-height: 1.5
            }

            *,
            :after,
            :before {
                box-sizing: border-box;
                border: 0 solid #e2e8f0
            }

            a {
                color: inherit;
                text-decoration: inherit
            }

            svg,
            video {
                display: block;
                vertical-align: middle
            }

            video {
                max-width: 100%;
                height: auto
            }

            .bg-white {
                --bg-opacity: 1;
                background-color: white;
            }

            .bg-gray-100 {
                --bg-opacity: 1;
                background-color: white;
            }

            .border-gray-200 {
                --border-opacity: 1;
                border-color: white;
            }

            .border-t {
                border-top-width: 1px
            }

            .flex {
                display: flex
            }

            .grid {
                display: grid
            }

            .hidden {
                display: none
            }

            .items-center {
                align-items: center
            }

            .justify-center {
                justify-content: center
            }

            .font-semibold {
                font-weight: 600
            }

            .h-5 {
                height: 1.25rem
            }

            .h-8 {
                height: 2rem
            }

            .h-16 {
                height: 4rem
            }

            .text-sm {
                font-size: .875rem
            }

            .text-lg {
                font-size: 1.125rem
            }

            .leading-7 {
                line-height: 1.75rem
            }

            .mx-auto {
                margin-left: auto;
                margin-right: auto
            }

            .ml-1 {
                margin-left: .25rem
            }

            .mt-2 {
                margin-top: .5rem
            }

            .mr-2 {
                margin-right: .5rem
            }

            .ml-2 {
                margin-left: .5rem
            }

            .mt-4 {
                margin-top: 1rem
            }

            .ml-4 {
                margin-left: 1rem
            }

            .mt-8 {
                margin-top: 2rem
            }

            .ml-12 {
                margin-left: 3rem
            }

            .-mt-px {
                margin-top: -1px
            }

            .max-w-6xl {
                max-width: 72rem
            }

            .min-h-screen {
                min-height: 100vh
            }

            .overflow-hidden {
                overflow: hidden
            }

            .p-6 {
                padding: 1.5rem
            }

            .py-4 {
                padding-top: 1rem;
                padding-bottom: 1rem
            }

            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .pt-8 {
                padding-top: 2rem
            }

            .fixed {
                position: fixed
            }

            .relative {
                position: relative
            }

            .top-0 {
                top: 0
            }

            .right-0 {
                right: 0
            }

            .shadow {
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
            }

            .text-center {
                text-align: center
            }

            .text-gray-200 {
                --text-opacity: 1;
                color: #edf2f7;
                color: rgba(237, 242, 247, var(--text-opacity))
            }

            .text-gray-300 {
                --text-opacity: 1;
                color: #e2e8f0;
                color: rgba(226, 232, 240, var(--text-opacity))
            }

            .text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .text-gray-500 {
                --text-opacity: 1;
                color: #a0aec0;
                color: rgba(160, 174, 192, var(--text-opacity))
            }

            .text-gray-600 {
                --text-opacity: 1;
                color: #718096;
                color: rgba(113, 128, 150, var(--text-opacity))
            }

            .text-gray-700 {
                --text-opacity: 1;
                color: #4a5568;
                color: rgba(74, 85, 104, var(--text-opacity))
            }

            .text-gray-900 {
                --text-opacity: 1;
                color: #1a202c;
                color: rgba(26, 32, 44, var(--text-opacity))
            }

            .underline {
                text-decoration: underline
            }

            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale
            }

            .w-5 {
                width: 1.25rem
            }

            .w-8 {
                width: 2rem
            }

            .w-auto {
                width: auto
            }

            .grid-cols-1 {
                grid-template-columns: repeat(1, minmax(0, 1fr))
            }

            @media (min-width:640px) {
                .sm\:rounded-lg {
                    border-radius: .5rem
                }

                .sm\:block {
                    display: block
                }

                .sm\:items-center {
                    align-items: center
                }

                .sm\:justify-start {
                    justify-content: flex-start
                }

                .sm\:justify-between {
                    justify-content: space-between
                }

                .sm\:h-20 {
                    height: 5rem
                }

                .sm\:ml-0 {
                    margin-left: 0
                }

                .sm\:px-6 {
                    padding-left: 1.5rem;
                    padding-right: 1.5rem
                }

                .sm\:pt-0 {
                    padding-top: 0
                }

                .sm\:text-left {
                    text-align: left
                }

                .sm\:text-right {
                    text-align: right
                }
            }

            @media (min-width:768px) {
                .md\:border-t-0 {
                    border-top-width: 0
                }

                .md\:border-l {
                    border-left-width: 1px
                }

                .md\:grid-cols-2 {
                    grid-template-columns: repeat(2, minmax(0, 1fr))
                }

                .md\:grid-cols-3 {
                    grid-template-columns: repeat(3, minmax(0, 1fr))
                }
            }

            @media (min-width:1024px) {
                .lg\:px-8 {
                    padding-left: 2rem;
                    padding-right: 2rem
                }
            }

        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

        </style>
    </head>

    <body class="antialiased">
        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="underline flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h2>Aplicació de Gestió de FlyFly S.L</h2>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        @if (true)
                            <div class="p-6">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                        class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                    <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('usuaris') }}"
                                            class="underline text-gray-900 dark:text-white">Gestió d'Usuaris</a></div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        Accés a la gestió de treballadors de la empresa.
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="bi bi-people" viewBox="0 0 16 16">
                                    <path
                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white"><a
                                        href="{{ url('clients') }}" class="underline text-gray-900 dark:text-white">Gestió
                                        de Clients</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Accés a la gestió de clients de la empresa.
                                </div>
                            </div>
                        </div>
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 640 512">
                                    <path
                                        d="M484.6 62C502.6 52.8 522.6 48 542.8 48H600.2C627.2 48 645.9 74.95 636.4 100.2C618.2 148.9 582.1 188.9 535.6 212.2L262.8 348.6C258.3 350.8 253.4 352 248.4 352H110.7C101.4 352 92.5 347.9 86.42 340.8L13.34 255.6C6.562 247.7 9.019 235.5 18.33 230.8L50.49 214.8C59.05 210.5 69.06 210.2 77.8 214.1L135.1 239.1L234.6 189.7L87.64 95.2C77.21 88.49 78.05 72.98 89.14 67.43L135 44.48C150.1 36.52 169.5 35.55 186.1 41.8L381 114.9L484.6 62zM0 480C0 462.3 14.33 448 32 448H608C625.7 448 640 462.3 640 480C640 497.7 625.7 512 608 512H32C14.33 512 0 497.7 0 480z" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white"><a
                                        href="{{ url('empleats') }}"
                                        class="underline text-gray-900 dark:text-white">Gestió de Vols</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Accés a la gestió de vols de la empresa.
                                </div>
                            </div>
                        </div>
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-book" viewBox="0 0 16 16">
                                    <path
                                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white"><a
                                        href="{{ url('empleats') }}"
                                        class="underline text-gray-900 dark:text-white">Gestió de Reserves</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Accés a la gestió de reserves de la empresa.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
