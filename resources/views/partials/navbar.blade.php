<nav class="bg-gray-800" x-data="{ isOpen: false }">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8" >
    <div class="relative flex h-16 items-center justify-between" >
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden" >
        <!-- Mobile menu button-->
        <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center  sm:items-stretch sm:justify-start">
        <div class="flex ms-10">
          <a href="/"><img class="h-12 w-auto" src="{{ asset('assets/images/logo-icon.png') }}" alt="Your Company"></a>
        </div>

        <div class="hidden sm:ml-6 sm:flex items-center ">
          <div class="flex space-x-4 ">
            <a href="/" class="{{ request() -> is('/') ? 'bg-gray-900 text-white' : 'text-gray-300' }} rounded-md  px-3 py-2 text-sm font-medium hover:bg-gray-700" aria-current="page">Home</a>
            <a href="/blog" class="{{ request() -> is('blog*') ? 'bg-gray-900 text-white' : 'text-gray-300' }} rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a>
            <a href="/category" class="{{ request() -> is('category*') ? 'bg-gray-900 text-white' : 'text-gray-300' }} rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Category</a>
            <a href="/about" class="{{ request() -> is('about') ? 'bg-gray-900 text-white' : 'text-gray-300' }} rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
            <a href="/contact" class="{{ request() -> is('contact') ? 'bg-gray-900 text-white' : 'text-gray-300' }} rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        @auth
          <p class="text-white">Welcome back, {{ auth()->user()->name }}</p>
          <div class="relative ml-3" x-data="{ isOpen: false }">
            <div>
              <button type="button" @click="isOpen = !isOpen" class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
            </div>
            <div 
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
              <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="cursor-pointer block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</butt>
              </form>
              
            </div>
          </div>
        @else
          <a href="/login" class="{{ request() -> is('login') ? 'bg-gray-900 text-white' : 'text-gray-300 border border-gray-900 hover:bg-gray-900' }} rounded-md  px-3 py-2 text-sm font-medium me-2">Login</a>

          <a href="/register" class="{{ request() -> is('register') ? 'bg-gray-900 text-white' : 'text-gray-300 border border-gray-900 hover:bg-gray-900' }} rounded-md  px-3 py-2 text-sm font-medium ">Register</a>
        @endauth
        
        
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div x-show="isOpen" class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
    </div>
  </div>
</nav>