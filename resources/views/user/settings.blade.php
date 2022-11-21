@extends('layouts.main')
@section('container')
    <div class="mt-10 grid">
        <div class="mx-auto w-fit rounded-lg">
            <div class="p-5 grid justify-center my-5">
                <a href="/user/home" class="font-bold flex gap-2 leading-10 w-fit"><img src="/img/icon/ic_back.svg"
                        alt="" />
                    <h1>Kembali</h1>
                </a>
                @if (auth()->user()->image)
                    <img src="{{ asset('storage/' . auth()->user()->image) }}"
                        class="w-15 h-15 md:w-48 md:h-48 mx-auto rounded-full" alt="" />
                @else
                    <img src="https://source.unsplash.com/500x500/?profile" class="w-15 md:w-48 mx-auto rounded-full"
                        alt="" />
                @endif
                <form action="/user/settings/{{ $user->id }}" method="POST" enctype="multipart/form-data"
                    class="mt-3">
                    @method('put')
                    @csrf
                    <div class="flex">
                        <h1 class="font-bold text-xl mt-3">Detail</h1>
                        <button
                            class="block ml-auto border border-green-500 text-green-500 hover:bg-green-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="submit">
                            Simpan
                        </button>
                    </div>
                    <div class="mt-5 rounded-lg border p-3">
                        <div class="flex">
                            @if (session()->has('success'))
                                <span id="success"
                                    class="inline-flex items-center py-2 px-3 mr-2 mb-5 text-sm font-medium text-green-800 bg-green-100 rounded">
                                    {{ session('success') }}
                                    <button type="button"
                                        class="inline-flex items-center p-0.5 ml-2 text-sm text-green-400 bg-transparent rounded-sm hover:bg-green-200 hover:text-green-900"
                                        data-dismiss-target="#success" aria-label="Remove">
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
                            @error('username')
                                <span id="badge-dismiss-red"
                                    class="inline-flex items-center py-1 px-2 mr-2 mb-5 text-sm font-medium text-red-800 bg-red-100 rounded">
                                    {{ $message }}
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
                            @enderror
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <label for="username">Username</label>
                                        </th>
                                        <td class="py-4 px-6">
                                            <input type="text" name="username" id="username" placeholder="Username"
                                                required value="{{ $user->username }}"
                                                class="px-3 py-2 border border-lg border-gray-300 rounded-lg text-sm" />
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b dark:bg-gray-800">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Password
                                        </th>
                                        <td class="py-4 px-6">
                                            <button
                                                class="block border border-red-500 text-red-500 hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button" data-modal-toggle="popup-modal">
                                                Change Password
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="bg-white dark:bg-gray-800">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Gambar
                                        </th>
                                        <td class="py-4 px-6">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                for="multiple_files">Upload Gambar Profil Baru</label>
                                            <input name="image"
                                                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                id="multiple_files" type="file" multiple="" />
                                        </td>
                                        <td>
                                            <button class="w-4 h-4" name="update_profil">
                                                <img src="image/ic_edit.svg" alt="" />
                                            </button>
                                        </td>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
