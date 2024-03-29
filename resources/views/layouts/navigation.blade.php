<nav
    class="bg-white border-b border-gray-100 position-fixed w-100"
    style="box-shadow: 0px -15px 20px black;"
>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-3">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <a href="/" class="flex items-center text-indigo-400 hover:text-indigo-500 fs-1 font-bold">
                    BUSIOS
                </a>

                <!-- Navigation Links -->
                <div class="flex" style="margin-left: 2.5rem">
                    <x-nav-link
                        :href="route('dashboard.index')"
                        :active="request()->routeIs('dashboard.index')"
                    >
                        Dashboard
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out dropdown-toggle"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <p class="pe-1">{{ Auth::user()->name }}</p>
                        </button>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fa-solid fa-arrow-right-from-bracket text-gray-500"></i> Sair
                                </a>
                            </li>
                        </ul>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
