<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <title>Laravel 10</title>

</head>
<body>

<header class="w-full px-6 bg-white">
    <div class="container mx-auto max-w-4xl md:flex justify-between items-center">
        <a href="#" class="block py-6 w-full text-center md:text-left md:w-auto text-gray-600 not-underline flex justify-center items-center">
            TCR webshop
        </a>
        <div class="w-full md:w-auto mb-6 md:mb-0 text-center md:text-right">
            @guest
                @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block no-underline bg-black text-white text-sm py-2 px-3">Sign Up</a>
                @endif
                <a href="{{ route('login') }}" class="inline-block no-underline bg-black text-white text-sm py-2 px-3">Login</a>
            @else
               <div class="w-full text-gray-700 bg-white">
                   <div x-data="{ open: false} class=flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                       <nav :class="{ 'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-8 hidden md:flex md:justify-and md:flex-row">
                           <div @click.away="open = false" class="relative" x-data="{open: false}">
                                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent dark-mode:focus:text">
                                    <div class="w-8 h-8 overflow-hidden rounded full inline-block">
                                        <img class="w-full h-full obejct-cover" src="{{ asset('img/user.svg') }}">
                                    </div>
                                    <span class="text-center align-text-bottom w-16 h-8 overflow-hidden inline-block">{{ Auth::user()->name }}</span>
                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline-block w-4 h-4 mt-1 transition-transform duration-200 transform md:-mt-1"></svg>
                                </button>
                               <div x-show="open"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    @click.away="open = false">
                                   <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                       <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" href="#">Edit My Profile</a>
                                       <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" href="#">My Inbox</a>
                                       <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" href="#">Tasks</a>
                                       <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" href="#">Chats</a>
{{--                                       @hasanyrole('teacher|admin|student')--}}
                                       <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none" href="{{ route('projects.index') }}">Admin</a>
{{--                                       @endhasanyrole--}}
                                       <hr>
                                       <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="px-4 py-2 capitalize font-medium text-sm tracking-wide">
                                           <i class="fad fa-user-times text-xs mr-1">
                                               Log Out
                                           </i>
                                       </a>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                           @csrf
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </nav>
                   </div>
                </div>
            @endguest
        </div>
    </div>
</header>
{{--header--}}


{{--nav--}}
<!-- nav -->
<nav class="w-full bg-white md:pt-0 px-6 relative z-20 border-t border-b border-gray-300">
    <div class="container mx-auto max-w-4xl md:flex justify-between items-center text-sm md:text-md md:justify-start">
        <div class="w-full md:w-1/2 text-center md:text-left py-4 flex flex-wrap justify-center items-stretch md:justify-start md:items-start">
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Home</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Category</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Products</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">About Us</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">News</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline">Contact</a>
        </div>
        <div class="w-full md:w-1/2 text-center md:text-right pb-4 md:p-0">
            <input type="search" placeholder="Search..." class="bg-gray-200 border text-sm p-1" />
        </div>
    </div>
</nav>
<!-- /nav -->

@yield('content')

{{--about--}}
<div class="w-full px-6 py-12 text-left bg-gray-300 text-gray-700 leading-normal">
    <div class="container max-w-4xl mx-auto flex justify-center flex-wrap md:flex-no-wrap">
        <div class="w-full md:w-1-3">
            <h3 class="text-3xl mb-8 text black leading tight">Best products of the whole world!</h3>
            <p class="mb-5">Mushroom Products</p>
            <p>(inclusive drugs)</p>
        </div>
    </div>
</div>
{{--about--}}

<!-- footer -->
<footer class="w-full bg-white px-6 border-t">
    <div class="container mx-auto max-w-4xl py-6 flex flex-wrap md:flex-no-wrap justify-between items-center text-sm">
        &copy;2019 Your Company. All rights reserved.
        <div class="pt-4 md:p-0 text-center md:text-right text-xs">
            <a href="#" class="text-black no-underline hover:underline">Privacy Policy</a>
            <a href="#" class="text-black no-underline hover:underline ml-4">Terms &amp; Conditions</a>
            <a href="#" class="text-black no-underline hover:underline ml-4">Contact Us</a>
        </div>
    </div>
</footer>
<!-- /footer -->

</body>
</html>
