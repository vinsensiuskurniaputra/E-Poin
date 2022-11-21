<nav class="bg-black text-white border-white px-2 sticky top-0 sm:px-4 py-2.5 rounded">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center font-bold text-2xl">
            E-Poin
        </a>
        <div class="flex items-center md:order-2">
            @auth
                <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    @if (auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" class="w-8 h-8 rounded-full"
                            alt="" />
                    @else
                        <img src="https://source.unsplash.com/500x500/?profile" class="w-8 h-8 rounded-full"
                            alt="" />
                    @endif
                </button>
                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow"
                    id="user-dropdown" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom"
                    style="
                    position: absolute;
                    inset: 0px auto auto 0px;
                    margin: 0px;
                    transform: translate3d(0px, 550px, 0px);
                    ">
                    <div class="py-3 px-4">
                        <span class="block text-sm text-gray-900">{{ auth()->user()->username }}</span>
                    </div>
                    <ul class="py-1" aria-labelledby="user-menu-button">
                        <li>
                            <a href="/user/settings"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?')"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login"
                    class="flex border border-white rounded-lg text-white hover:bg-white hover:text-black px-3 py-1 group mr-1">
                    <h1 class="font-bold">Login</h1>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="ml-3 my-auto"
                        xmlns="http://www.w3.org/2000/svg">
                        <path class="group-hover:stroke-black"
                            d="M15 7C16.1046 7 17 7.89543 17 9M21 9C21 12.3137 18.3137 15 15 15C14.3938 15 13.8087 14.9101 13.2571 14.7429L11 17H9V19H7V21H4C3.44772 21 3 20.5523 3 20V17.4142C3 17.149 3.10536 16.8946 3.29289 16.7071L9.25707 10.7429C9.08989 10.1914 9 9.60617 9 9C9 5.68629 11.6863 3 15 3C18.3137 3 21 5.68629 21 9Z"
                            stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            @endauth
            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="flex flex-col p-4 mt-4 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                <li>
                    <a href="@auth /user/home @else / @endauth"
                        class="block py-2 pr-4 pl-3 rounded
                        @if ($title == 'Home') text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0
                        @else
                            text-gray-400 hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 @endif 
                        ">Home</a>
                </li>
                @auth
                    <li>
                        <a href="/user/tambah-pelanggaran"
                            class="block py-2 pr-4 pl-3 rounded
                        @if ($title == 'Tambah Pelanggaran') text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0
                        @else
                            text-gray-400 hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 @endif 
                        ">Tambah
                            Pelanggaran</a>
                    </li>
                    <li>
                        <a href="/user/history"
                            class="block py-2 pr-4 pl-3 rounded
                        @if ($title == 'History') text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0
                        @else
                            text-gray-400 hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 @endif 
                        ">History</a>
                    </li>
                @else
                    <li>
                        <a href="/user/about"
                            class="block py-2 pr-4 pl-3 rounded
                        @if ($title == 'About') text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0
                        @else
                            text-gray-400 hover:bg-gray-100 hover:text-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 @endif 
                        ">About</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
