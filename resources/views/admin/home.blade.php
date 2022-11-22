@extends('layouts.main')
@section('container')
    <div class="flex">
        @include('components.admin.navbar')
        <div class="w-full mt-20 mx-10 mb-10 md:mt-10">
            <h1 class="font-light">Selamat Datang,</h1>
            <h1 class="font-bold text-3xl">{{ auth()->user()->username }}</h1>
            <h1 class="font-bold text-md mt-10">Menu</h1>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-5">
                <div class="w-full text-white">
                    <div class="bg-[#1C0C5B] p-5 rounded-t-lg">
                        <h1 class="font-bold text-2xl">{{ $students->count() }}</h1>
                        <h1>Jumlah Siswa</h1>
                    </div>
                    <a href="/admin/daftar-siswa"
                        class="bg-[#916BBF] hover:bg-[#C996CC] hover:text-[#1C0C5B] rounded-b-lg flex p-2 group">
                        <div class="mx-auto flex leading-4">
                            <h1>More Info</h1>
                            <svg class="group-hover:stroke-[#1C0C5B] ml-2" width="20" height="20" viewBox="0 0 20 20"
                                fill="none" stroke="white" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.8333 7.5L13.3333 10M13.3333 10L10.8333 12.5M13.3333 10L6.66667 10M17.5 10C17.5 14.1421 14.1421 17.5 10 17.5C5.85786 17.5 2.5 14.1421 2.5 10C2.5 5.85786 5.85786 2.5 10 2.5C14.1421 2.5 17.5 5.85786 17.5 10Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="w-full text-white">
                    <div class="bg-[#1C0C5B] p-5 rounded-t-lg">
                        <h1 class="font-bold text-2xl">
                            @if ($role->where('id', '0')->first() != null)
                                {{ $role->where('id', '0')->first()->user->count() }}
                            @else
                                0
                            @endif
                        </h1>
                        <h1>Jumlah User</h1>
                    </div>
                    <a href="/admin/daftar-user"
                        class="bg-[#916BBF] hover:bg-[#C996CC] hover:text-[#1C0C5B] rounded-b-lg flex p-2 group">
                        <div class="mx-auto flex leading-4">
                            <h1>More Info</h1>
                            <svg class="group-hover:stroke-[#1C0C5B] ml-2" width="20" height="20" viewBox="0 0 20 20"
                                fill="none" stroke="white" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.8333 7.5L13.3333 10M13.3333 10L10.8333 12.5M13.3333 10L6.66667 10M17.5 10C17.5 14.1421 14.1421 17.5 10 17.5C5.85786 17.5 2.5 14.1421 2.5 10C2.5 5.85786 5.85786 2.5 10 2.5C14.1421 2.5 17.5 5.85786 17.5 10Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="w-full text-white">
                    <div class="bg-[#1C0C5B] p-5 rounded-t-lg">
                        <h1 class="font-bold text-2xl">
                            @if ($role->where('id', '1')->first() != null)
                                {{ $role->where('id', '1')->first()->user->count() }}
                            @else
                                0
                            @endif
                        </h1>
                        <h1>Jumlah Admin</h1>
                    </div>
                    <a href="/admin/daftar-admin"
                        class="bg-[#916BBF] hover:bg-[#C996CC] hover:text-[#1C0C5B] rounded-b-lg flex p-2 group">
                        <div class="mx-auto flex leading-4">
                            <h1>More Info</h1>
                            <svg class="group-hover:stroke-[#1C0C5B] ml-2" width="20" height="20" viewBox="0 0 20 20"
                                fill="none" stroke="white" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.8333 7.5L13.3333 10M13.3333 10L10.8333 12.5M13.3333 10L6.66667 10M17.5 10C17.5 14.1421 14.1421 17.5 10 17.5C5.85786 17.5 2.5 14.1421 2.5 10C2.5 5.85786 5.85786 2.5 10 2.5C14.1421 2.5 17.5 5.85786 17.5 10Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                </div>
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
                                        <td class="py-4 px-6">{{ $student->name }}</td>
                                        <?php
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
    </div>
@endsection
