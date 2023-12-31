<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $metaTitle ?: \App\Models\TextWidget::getTitle('header') }}
    </title>
    <meta name="author" content="">
    <meta name="description" content="{{ $metaDescription }}">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    @foreach($locations as $location)
                        <li>
                            <a
                            class="hover:text-gray-200 hover:underline px-4 {{ request('location')?->slug === $location->slug ? 'bg-white-600 text-black' : '' }}"
                            href="{{ route('by-location', $location) }}">
                                {{ $location->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

    </nav>

    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a
                href="#"
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open"
            >
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-wrap sm:flex-row items-center justify-between text-sm font-bold uppercase mt-0 px-6 py-2">
                <div>
                    <a href="{{ route('all-news')}}" class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">All News</a>
                    @foreach($categories as $category)
                        <a href="{{ route('by-category', $category) }}"
                            class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2 {{ request('category')?->slug === $category->slug ? 'bg-blue-600 text-white' : '' }}">
                            {{ $category->title }}
                        </a>
                    @endforeach
                    <a href="{{route('about-us')}}" class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">About
                        us</a>
                </div>

                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <form method="get" action="{{ route('search') }}">
                        <input name="q" value="{{request()->get('q')}}"
                               class="block w-full rounded-md border-0 px-3.5 py-2 t0ext-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 font-medium"
                               placeholder="Type and hit enter"/>
                    </form>
                    @auth
                        <div class="flex sm:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="hover:bg-blue-600 hover:text-white flex items-center rounded py-2 px-4 mx-2">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <a href="{{route('login')}}"
                           class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">Login</a>
                        <a href="{{route('register')}}" class="bg-blue-600 text-white rounded py-2 px-4 mx-2">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="{{ route('home') }}">
            {!! \App\Models\TextWidget::getTitle('header') !!}
            </a>
            <p class="text-lg text-gray-600">
                {!! \App\Models\TextWidget::getContent('tagline') !!}
            </p>
        </div>
    </header>



    <div class="container mx-auto flex flex-wrap py-6">

        {{ $slot }}

    </div>

    <footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="{{ route('about-us') }}" class="uppercase px-3">About Us</a>
                <a href="{{ route('privacy-policy') }}" class="uppercase px-3">Privacy Policy</a>
                <a href="{{ route('terms-and-conditions') }}" class="uppercase px-3">Terms & Conditions</a>
                <a href="{{ route('contact-us') }}" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">
                &copy; {{ $metaTitle ?: \App\Models\TextWidget::getTitle('header') }}
            </div>
        </div>
    </footer>
    @livewireScripts
</body>
</html>
