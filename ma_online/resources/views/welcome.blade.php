<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <title>Ma Online</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
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

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
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
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        @media (min-width: 640px) {
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

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-ma-gray">
    @auth


    {{-- INGELOGD --}}
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white leading-tightt">
            <span>
                {{ __('Homepage') }}
            </span>
            </h2>
        </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="cols-phone-welcome overflow-hidden text-ma-white grid grid-cols-3 gap-6">
                @foreach ($videos as $video)
                <div class="single-video">
                    <div class="single-video-inner p-4">
                        <a href="{{ route('video', ['id'=>$video->id]) }}">
                            <div class="thumbnail-controller relative hover:text-magenta-100 transition-all hover:text-opacity-70">
                                <div class="thumbnail-inner absolute">
                                    <i class="fas fa-play"></i>
                                </div>
                                <img src="https://img.youtube.com/vi/{{ $video->video_id }}/0.jpg" alt="">
                            </div>
                            <h2 class="video-title text-white font-bold pt-4">{{ __($video->title) }}</h2>
                            <p class="mb-3 text-ma-white text-xs inline-block ml-2 mt-2">
                                {{ __(App\Models\User::where(['id' => $video->user_id])->pluck('name')->first()) }}
                                @if (App\Models\User::where(['id' => $video->user_id])->pluck('role')->first() == 1)
                                    <i class="fas fa-star text-magenta-100"></i>
                                @elseif (App\Models\User::where(['id' => $video->user_id])->pluck('role')->first() == 2)
                                    <i class="fas fa-check text-lightgreen-100"></i>
                                @endif
                            </p>
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition inline-block float-left">
                                    <img class="h-8 w-8 rounded-full object-cover inline-block"
                                    src="{{ App\Models\User::where(['id' => $video->user_id])->pluck('profile_photo_path')->first() }}"
                                    alt="{{ App\Models\User::where(['id' => $video->user_id])->pluck('name')->first() }}"/>
                                </button>
                            @endif
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-app-layout>
    @endauth
    <div class="@auth @else welcome-background min-h-screen @endauth flex justify-center sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="welcome-login fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                @else
                    <a href="{{ route('login') }}" class="text-xl text-ma-white">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-xl text-ma-white">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        @auth
        @else
            <img class="welcome-image-width" src="https://i.ibb.co/FHTDTKx/logo-ma-online.png"
            alt="Ma online logo"/>
        @endauth
    </div>


    {{-- NIET INGELOGD --}}
    @auth
    @else
        <x-guest-layout>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4">
                    <form class="mr-9" action="{{ route('search') }}" method="GET">
                        @csrf
                        <input type="hidden" name="unknown" id="unknown"
                        value="guest">
                        <input
                            class="relative inline-block focus:ring-lightgreen-100 flex-1 w-full bg-ma-light-gray sm:text-sm text-magenta-100"
                            type="text" name="search"
                            placeholder="Zoeken..." maxlength="245">
                        <button
                            class="search-button inline-block search-button bg-ma-magenta hover:bg-lightgreen-100 absolute transition-all"
                            type="submit">
                            <img class="search-button-inner"><i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="breakpoint-phone overflow-hidden text-ma-white grid grid-cols-3 gap-6">
                    @foreach ($videos as $video)
                    <div class="single-video">
                        <div class="single-video-inner p-4">
                            <a href="{{ route('video', ['id'=>$video->id]) }}">
                                <div class="thumbnail-controller relative hover:text-magenta-100 transition-all hover:text-opacity-80">
                                    <div class="thumbnail-inner absolute">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <img src="https://img.youtube.com/vi/{{ $video->video_id }}/0.jpg" alt="">
                                </div>
                                <h2 class="video-title text-white font-bold pt-4">{{ __($video->title) }}</h2>
                                <p class="mb-3 text-ma-white text-xs inline-block ml-2 mt-2">
                                    {{ __(App\Models\User::where(['id' => $video->user_id])->pluck('name')->first()) }}
                                    @if (App\Models\User::where(['id' => $video->user_id])->pluck('role')->first() == 1)
                                        <i class="fas fa-star text-magenta-100"></i>
                                    @elseif (App\Models\User::where(['id' => $video->user_id])->pluck('role')->first() == 2)
                                        <i class="fas fa-check text-lightgreen-100"></i>
                                    @endif
                                </p>
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition inline-block float-left">
                                        <img class="h-8 w-8 rounded-full object-cover inline-block"
                                        src="{{ App\Models\User::where(['id' => $video->user_id])->pluck('profile_photo_path')->first() }}"
                                        alt="{{ App\Models\User::where(['id' => $video->user_id])->pluck('name')->first() }}"/>
                                    </button>
                                @endif
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </x-guest-layout>
    @endauth
</body>
</html>
