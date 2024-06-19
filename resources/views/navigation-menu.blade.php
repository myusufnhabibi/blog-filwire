<nav class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="nav-left" class="flex items-center">
        <x-application-logo />
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                {{-- <li>
                    <a class="flex space-x-2 items-center hover:text-yellow-900 text-sm text-yellow-500"
                        href="http://127.0.0.1:8000">
                        Home
                    </a>
                </li> --}}
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link href="{{ route('post.index') }}" :active="request()->routeIs('post.index')">
                    {{ __('Blogs') }}
                </x-nav-link>
            </div>
        </div>
    </div>
    <div id="nav-right" class="flex items-center md:space-x-6">
        @auth
            @include('layouts.partials.header-auth')
        @else
            @include('layouts.partials.header-guest')
        @endauth

    </div>
</nav>
