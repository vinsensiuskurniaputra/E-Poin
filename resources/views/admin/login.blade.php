@extends('layouts.main')
@section('container')
    <div class="sm:flex">
        <div class="grid bg-black h-screen w-full p-5 sm:w-7/12">
            <div class="m-auto text-center text-white">
                <img src="/img/vektor.png" class="mx-auto w-10/12" />
                <h1 class="font-bold text-3xl mt-10">Selamat Datang User</h1>
                <h1 class="font-light mt-3">
                    Selamat Datang, Ayo Login Sebelum anda masuk ke halaman user dan
                    mulai berkerja.
                </h1>
                <a href="#login"
                    class="block w-fit px-5 py-3 mt-10 mx-auto text-white border border-white rounded-lg hover:bg-white hover:text-black sm:hidden">
                    Login
                </a>
            </div>
        </div>
        <div class="grid h-screen w-full sm:w-5/12">
            <div class="w-full p-10 my-auto" id="login">
                <div class="flex">
                    <h1 class="font-bold text-xl ml-auto">E - Poin</h1>
                </div>
                <div class="flex flex-col items-center">
                    <div class="flex flex-col w-full mt-10">
                        <div class="flex mb-5">
                            @if (session()->has('error'))
                                <span id="badge-dismiss-red"
                                    class="inline-flex items-center py-1 px-2 mr-2 mb-5 text-sm font-medium text-red-800 bg-red-100 rounded">
                                    {{ session('error') }}
                                    <button type="button"
                                        class="inline-flex items-center p-0.5 ml-2 text-sm text-red-400 bg-transparent rounded-sm hover:bg-red-200 hover:text-red-900 dark:hover:bg-red-300 dark:hover:text-red-900"
                                        data-dismiss-target="#badge-dismiss-red" aria-label="Remove">
                                        <svg aria-hidden="true" class="w-3.5 h-3.5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Remove badge</span>
                                    </button>
                                </span>
                            @endif
                        </div>
                        <h1 class="font-bold text-2xl">LOG IN</h1>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="relative flex flex-col justify-start">
                                <label for="username" class="font-semibold text-sm mt-5">Username</label>
                                <input type="text" name="username" id="username" placeholder=" Username" required
                                    class="mt-2 px-3 py-2 border border-lg border-gray-500 rounded-lg text-sm" />
                                <label for="password" class="font-semibold text-sm mt-3">Password</label>
                                <input type="password" name="password" id="password" placeholder=" Password" required
                                    class="mt-2 px-3 py-2 border border-lg border-gray-500 rounded-lg text-sm" />
                                <button type="submit"
                                    class="mt-5 bg-[#000000] p-2 font-bold text-white rounded-lg hover:bg-[#610094]">
                                    Masuk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
