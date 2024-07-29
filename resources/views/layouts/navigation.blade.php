<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="px-4 lg:px-8 shadow-lg p-3">
        <div class="flex justify-between h-16">
            <div class="flex">
                @if(Auth::user()->name == 'Admin')
                    <h2 class="font-semibold text-gray-400 text-2xl mt-5">
                        <i class="fa-solid fa-anchor" style="margin: 5px"></i> {{ __("Tableau de bord d'administration") }}
                    </h2>              
                @endif  
            </div>

            <!-- Settings Dropdown -->
            <div class=" sm:flex sm:items-center sm:ms-6">
                <x-dropdown  width="48" >
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent leading-4 rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @if(Auth::user()->name == 'Admin')
                                <div>
                                    <i class="fa-solid fa-user-gear fa-lg" style="cursor: pointer; margin: 2px !important"></i>
                                </div>  
                            @else 
                                <div>
                                    <i class="fa-solid fa-circle-user fa-lg" style="cursor: pointer; margin: 2px !important"></i>
                                </div> 
                            @endif
                            
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                
                    <x-slot name="content">
                        @if(Auth::user()->name != 'Admin')
                            <p style="text-align: center; margin-bottom:10px">Bienvenue {{Auth::user()->name}} ! </p>
                            <x-dropdown-link :href="route('home')">
                                <i class="fa-solid fa-house" style="margin: 2px !important"></i> {{ __('Accueil') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile')">
                                <i class="fa-regular fa-id-badge" style="margin: 2px !important"></i> {{ __('Profil') }}
                            </x-dropdown-link>
                        @else
                            <x-dropdown-link :href="route('admin.admin-dashboard')">
                                <i class="fa-solid fa-anchor" style="margin: 2px !important"></i> {{ __('Tableau de bord') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('voyager.dashboard')">
                                <i class="fa-solid fa-ship" style="margin: 2px !important"></i> {{ __('Voyager') }}
                            </x-dropdown-link>
                            
                        @endif
                        <!-- Authentication -->
                        @if(Auth::user()->name != 'Admin')
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fa-solid fa-power-off"></i> {{ __('Se déconnecter') }}
                                </x-dropdown-link>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin_guest.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('admin_guest.logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fa-solid fa-power-off" style="margin:2px"></i> {{ __('Se déconnecter') }}
                                </x-dropdown-link>
                            </form>
                        @endif
                        
                    </x-slot>
                </x-dropdown>
                
            </div>
            

            {{-- <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> --}}
        </div>
    </div>

    {{-- <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div> --}}
</nav>
