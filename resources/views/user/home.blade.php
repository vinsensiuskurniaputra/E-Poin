@extends('layouts.main')
@section('container')
    @include('components.user.navbar')
    @auth
        <div class="m-10">
            <h1 class="font-light">Selamat Datang,</h1>
            <h1 class="font-bold text-3xl">{{ auth()->user()->username }}</h1>
            <h1 class="font-bold text-md mt-10">Menu</h1>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
                <a href="/user/tambah-pelanggaran"
                    class="w-full bg-red-500 hover:bg-red-900 hover:border-gray-500 rounded-lg border border-black p-5 text-center text-white hover:bg">Tambah
                    Pelanggaran</a>
                <a href="/user/history"
                    class="w-full bg-green-500 hover:bg-green-900 hover:border-gray-500 rounded-lg border border-black p-5 text-center text-white hover:bg">History</a>
            </div>
            <h1 class="font-bold text-md mt-10">Statistic</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="w-full mt-2">
                    <h1 class="text-sm">Top Pelanggaran</h1>
                    <div class="mt-2 h-[200px]">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-white bg-[#3F0071] rounded-full">
                                <tr>
                                    <th scope="col" class="py-3 px-6">No</th>
                                    <th scope="col" class="py-3 px-6">Nama Pelanggaran</th>
                                    <th scope="col" class="py-3 px-6">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6">{{ $loop->index + 1 }}</td>
                                        <td class="py-4 px-6">{{ $kategori->name }}</td>
                                        <td class="py-4 px-6">{{ $kategori->daftar_pelanggaran->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mt-2">
                    <h1 class="text-sm">Top Pelanggaran</h1>
                    <div class="mt-2 h-[200px]">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-white bg-[#3F0071] rounded-full">
                                <tr>
                                    <th scope="col" class="py-3 px-6">No</th>
                                    <th scope="col" class="py-3 px-6">Nama Siswa</th>
                                    <th scope="col" class="py-3 px-6">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students->take(3) as $student)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6">{{ $loop->index + 1 }}</td>
                                        <td class="py-4 px-6">{{ $student->name }}</td><?php
                                        $poin = 0;
                                        foreach ($student->daftar_pelanggaran as $pelanggar) {
                                            $poin += $pelanggar->kategori->poin;
                                        } ?>
                                        <td class="py-4 px-6">{{ $poin }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="w-full bg-gray-900 p-10 grid">
            <div class="m-auto grid text-center text-white">
                <h1 class="font-bold text-2xl">E - Poin</h1>
                <h1 class="font-light text-lg">Web Penyatatan Pelanggaran Siswa</h1>
                <img src="/img/logo_sekolah.jpg" class="mt-5 rounded-full border border-white w-6/12 mx-auto" alt="">
                <div class="grid grid-cols-2 mt-10 gap-4">
                    <a href="#statistic"
                        class="border-2 border-yellow-300 font-bold text-xl text-yellow-300 rounded-lg py-2 hover:bg-yellow-300 hover:text-gray-900">
                        Statistic Pelanggaran</a>
                    <a href="/user/about"
                        class="grid border-2 border-green-300 font-bold text-xl text-green-300 rounded-lg py-2 hover:bg-green-300 hover:text-gray-900">
                        <h1 class="my-auto">Tentang Kami</h1>
                    </a>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#111827" fill-opacity="1"
                d="M0,256L12.6,234.7C25.3,213,51,171,76,176C101.1,181,126,235,152,224C176.8,213,202,139,227,128C252.6,117,278,171,303,186.7C328.4,203,354,181,379,144C404.2,107,429,53,455,80C480,107,505,213,531,218.7C555.8,224,581,128,606,117.3C631.6,107,657,181,682,186.7C707.4,192,733,128,758,90.7C783.2,53,808,43,834,58.7C858.9,75,884,117,909,144C934.7,171,960,181,985,176C1010.5,171,1036,149,1061,160C1086.3,171,1112,213,1137,213.3C1162.1,213,1187,171,1213,149.3C1237.9,128,1263,128,1288,149.3C1313.7,171,1339,213,1364,213.3C1389.5,213,1415,171,1427,149.3L1440,128L1440,0L1427.4,0C1414.7,0,1389,0,1364,0C1338.9,0,1314,0,1288,0C1263.2,0,1238,0,1213,0C1187.4,0,1162,0,1137,0C1111.6,0,1086,0,1061,0C1035.8,0,1011,0,985,0C960,0,935,0,909,0C884.2,0,859,0,834,0C808.4,0,783,0,758,0C732.6,0,707,0,682,0C656.8,0,632,0,606,0C581.1,0,556,0,531,0C505.3,0,480,0,455,0C429.5,0,404,0,379,0C353.7,0,328,0,303,0C277.9,0,253,0,227,0C202.1,0,177,0,152,0C126.3,0,101,0,76,0C50.5,0,25,0,13,0L0,0Z">
            </path>
        </svg>
        <div class="p-10" id="statistic">
            <h1 class="font-bold text-xl text-center mt-10">Statistic</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                <div class="w-full mt-2">
                    <h1 class="text-sm">Top Kategori</h1>
                    <div class="mt-2">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-white bg-[#3F0071] rounded-full">
                                <tr>
                                    <th scope="col" class="py-3 px-6">No</th>
                                    <th scope="col" class="py-3 px-6">Nama Pelanggaran</th>
                                    <th scope="col" class="py-3 px-6">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6">{{ $loop->index + 1 }}</td>
                                        <td class="py-4 px-6">{{ $kategori->name }}</td>
                                        <td class="py-4 px-6">{{ $kategori->daftar_pelanggaran->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mt-2">
                    <h1 class="text-sm">Top Pelanggar</h1>
                    <div class="mt-2 h-[200px]">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-white bg-[#3F0071] rounded-full">
                                <tr>
                                    <th scope="col" class="py-3 px-6">No</th>
                                    <th scope="col" class="py-3 px-6">Nama Siswa</th>
                                    <th scope="col" class="py-3 px-6">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6">{{ $loop->index + 1 }}</td>
                                        <td class="py-4 px-6">{{ $student->name }}</td><?php
                                        $poin = 0;
                                        foreach ($student->daftar_pelanggaran as $pelanggar) {
                                            $poin += $pelanggar->kategori->poin;
                                        } ?>
                                        <td class="py-4 px-6">{{ $poin }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
