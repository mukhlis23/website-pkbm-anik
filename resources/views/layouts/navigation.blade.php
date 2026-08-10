<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">

    <!-- Primary Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Logo & Menu -->
            <div class="flex items-center">

                <!-- Logo PKBM -->
                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}" class="admin-brand">

                        <img src="{{ asset('storage/logo/logo-pkbm.png') }}"
                             alt="Logo PKBM"
                             class="admin-logo">

                        <div class="ms-2">

                            <div class="admin-title">
                                PKBM ANIK
                            </div>

                            <div class="admin-subtitle">
                                Dashboard Admin
                            </div>

                        </div>

                    </a>

                </div>

                <!-- Menu -->
                <div class="hidden sm:flex sm:items-center sm:ms-10">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')">

                        <i class="bi bi-speedometer2 me-2"></i>

                        Dashboard

                    </x-nav-link>

                </div>

            </div>


            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center px-3 py-2 bg-white border border-transparent rounded-md text-sm font-medium text-gray-700 hover:text-blue-600 transition">

                            <i class="bi bi-person-circle me-2"></i>

                            <span>{{ Auth::user()->name }}</span>

                            <svg class="fill-current h-4 w-4 ms-2"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">

                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>

                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">

                            <i class="bi bi-person me-2"></i>

                            Profil

                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                         this.closest('form').submit();">

                                <i class="bi bi-box-arrow-right me-2"></i>

                                Keluar

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            <!-- Mobile Button -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:bg-gray-100">

                    <svg class="h-6 w-6"
                         stroke="currentColor"
                         fill="none"
                         viewBox="0 0 24 24">

                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </button>

            </div>

        </div>

    </div>


    <!-- Responsive Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">

                <i class="bi bi-speedometer2 me-2"></i>

                Dashboard

            </x-responsive-nav-link>

        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800">

                    {{ Auth::user()->name }}

                </div>

                <div class="font-medium text-sm text-gray-500">

                    {{ Auth::user()->email }}

                </div>

            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link
                    :href="route('profile.edit')">

                    <i class="bi bi-person me-2"></i>

                    Profil

                </x-responsive-nav-link>

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault();
                                 this.closest('form').submit();">

                        <i class="bi bi-box-arrow-right me-2"></i>

                        Keluar

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>