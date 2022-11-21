<div class="hidden z-10 fixed md:flex md:static w-[300px]" id="navbar-default">
    <div class="static w-[400px] text-white text-center">
        <div class="fixed left-0 top-0 h-full bg-black w-[300px] overflow-y-auto">
            <h1 class="font-bold text-2xl mt-10">E - Poin</h1>
            <div class="flex flex-col font-bold mt-10 mb-5">
                <a href="/admin/home"
                    class="flex p-5 {{ $title === 'Home' ? 'bg-[#610094]' : 'hover:bg-[#3F0071]' }} leading-10">
                    <img src="/img/icon/ic_dashboard.svg" class="w-10" />
                    <h1 class="ml-3">Dashboard</h1>
                </a>
                <a href="/admin/kategori-pelanggaran"
                    class="flex p-5 {{ $title === 'Kategori Pelanggaran' ? 'bg-[#610094]' : 'hover:bg-[#3F0071]' }} leading-10">
                    <img src="/img/icon/ic_kategori_pelanggaran.svg" class="w-10" />
                    <h1 class="ml-3">Kategori Pelanggaran</h1>
                </a>
                <a href="/admin/pelanggaran-siswa"
                    class="flex p-5 {{ $title === 'Pelanggaran Siswa' ? 'bg-[#610094]' : 'hover:bg-[#3F0071]' }} leading-10">
                    <img src="/img/icon/ic_pelanggaran_siswa.svg" class="w-10" />
                    <h1 class="ml-3">Pelanggaran Siswa</h1>
                </a>
                <a href="/admin/daftar-kelas"
                    class="flex p-5 {{ $title === 'Daftar Kelas' ? 'bg-[#610094]' : 'hover:bg-[#3F0071]' }} leading-10">
                    <img src="/img/icon/ic_daftar_kelas.svg" class="w-10" />
                    <h1 class="ml-3">Daftar Kelas</h1>
                </a>
                <a href="/admin/daftar-siswa"
                    class="flex p-5 {{ $title === 'Daftar Siswa' ? 'bg-[#610094]' : 'hover:bg-[#3F0071]' }} leading-10">
                    <img src="/img/icon/ic_daftar_siswa.svg" class="w-10" />
                    <h1 class="ml-3">Daftar Siswa</h1>
                </a>
                <a href="/admin/daftar-user"
                    class="flex p-5 {{ $title === 'Daftar User' ? 'bg-[#610094]' : 'hover:bg-[#3F0071]' }} leading-10">
                    <img src="/img/icon/ic_daftar_user.svg" class="w-10" />
                    <h1 class="ml-3">Daftar User</h1>
                </a>
                <a href="/admin/daftar-admin"
                    class="flex p-5 {{ $title === 'Daftar Admin' ? 'bg-[#610094]' : 'hover:bg-[#3F0071]' }} leading-10">
                    <img src="/img/icon/ic_daftar_admin.svg" class="w-10" />
                    <h1 class="ml-3">Daftar Admin</h1>
                </a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?')"
                        class="flex p-5 leading-10 hover:bg-[#3F0071] w-full">
                        <img src="/img/icon/ic_log_out.svg" class="w-10" />
                        <h1 class="ml-3">Logout</h1>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<nav class="fixed md:hidden w-full top-0 bg-black text-white border-gray-200 px-4 py-2.5 rounded dark:bg-gray-900">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="#" class="flex items-center">
            <span class="self-center text-xl font-bold">E-Poin</span>
        </a>
        <form class="flex items-center w-7/12">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" required="" />
            </div>
            <button type="submit"
                class="p-2.5 ml-2 text-sm font-medium text-white bg-white rounded-lg border border-blue-700 hover:bg-black focus:ring-4 focus:outline-none focus:ring-blue-500">
                <svg class="w-5 h-5" fill="none" stroke="#610094" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:bg-white focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
</nav>
