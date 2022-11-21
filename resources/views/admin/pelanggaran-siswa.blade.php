@extends('layouts.main')
@section('container')
    <div class="flex">
        @include('components.admin.navbar')
        <div class="w-full">
            <div class="hidden md:grid p-5 bg-[#610094]">
                <form class="flex items-center">
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
            </div>
            <div class="mt-20 mx-10 mb-10 md:mt-10">
                <div class="flex mb-5">
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
                </div>
                <div class="flex leading-6">
                    <h1 class="font-bold text-xl">Pelanggaran Siswa</h1>
                    <button type="button" data-modal-toggle="tambah-pelanggaran"
                        class="ml-auto p-2 text-sm font-bold border border-red-500 text-red-500 hover:bg-red-500 hover:text-white rounded-lg">
                        Tambah Pelanggaran
                    </button>
                </div>
                <div class="overflow-x-auto w-full">
                    <table class="mt-10 w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white bg-[#3F0071] rounded-full">
                            <tr>
                                <th scope="col" class="py-3 px-6">No</th>
                                <th scope="col" class="py-3 px-6">NIS</th>
                                <th scope="col" class="py-3 px-6">Nama Siswa</th>
                                <th scope="col" class="py-3 px-6">Kategori</th>
                                <th scope="col" class="py-3 px-6">Pelapor</th>
                                <th scope="col" class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggarans as $pelanggaran)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6"> {{ $loop->index + 1 }} </td>
                                    <td class="py-4 px-6">
                                        @if ($pelanggaran->student != null)
                                            {{ $pelanggaran->student->nis }}
                                        @else
                                            Siswa Sudah Dihapus
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        @if ($pelanggaran->student != null)
                                            {{ $pelanggaran->student->name }}
                                        @else
                                            Siswa Sudah Dihapus
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        @if ($pelanggaran->kategori != null)
                                            {{ $pelanggaran->kategori->name }}
                                        @else
                                            Kategori Sudah Dihapus
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        @if ($pelanggaran->user != null)
                                            {{ $pelanggaran->user->username }}
                                        @else
                                            Admin Sudah Dihapus
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 flex gap-2">
                                        <form action="/admin/pelanggaran-siswa/{{ $pelanggaran->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pelanggaran Ini !')"
                                                class="border border-red-500 p-2 rounded-lg hover:bg-red-500 h-10 w-10 text-center group">
                                                <svg width="15" height="17" class="mx-auto" viewBox="0 0 15 17"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="group-hover:fill-white" fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M6.40086 0.36792C6.0203 0.36792 5.67241 0.582932 5.50222 0.923314L4.7752 2.37735H1.37728C0.822386 2.37735 0.372559 2.82718 0.372559 3.38207C0.372559 3.93696 0.822386 4.38679 1.37728 4.38679L1.37728 14.434C1.37728 15.5437 2.27693 16.4434 3.38671 16.4434H11.4244C12.5342 16.4434 13.4339 15.5437 13.4339 14.434V4.38679C13.9888 4.38679 14.4386 3.93696 14.4386 3.38207C14.4386 2.82718 13.9888 2.37735 13.4339 2.37735H10.036L9.30894 0.923314C9.13875 0.582932 8.79085 0.36792 8.4103 0.36792H6.40086ZM4.39143 6.39622C4.39143 5.84133 4.84125 5.3915 5.39614 5.3915C5.95103 5.3915 6.40086 5.84133 6.40086 6.39622V12.4245C6.40086 12.9794 5.95103 13.4292 5.39614 13.4292C4.84125 13.4292 4.39143 12.9794 4.39143 12.4245V6.39622ZM9.41501 5.3915C8.86012 5.3915 8.41029 5.84133 8.41029 6.39622V12.4245C8.41029 12.9794 8.86012 13.4292 9.41501 13.4292C9.9699 13.4292 10.4197 12.9794 10.4197 12.4245V6.39622C10.4197 5.84133 9.9699 5.3915 9.41501 5.3915Z"
                                                        fill="#FF0000" />
                                                </svg>
                                            </button>
                                        </form>
                                        <button type="button" data-modal-toggle="edit-{{ $loop->index }}"
                                            class="border border-green-500 p-2 rounded-lg h-10 w-10 text-center hover:bg-green-500 group">
                                            <svg width="15" height="17" class="mx-auto" viewBox="0 0 15 17"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    class="group-hover:fill-white"
                                                    d="M1.566 0.36792C2.12089 0.36792 2.57071 0.817747 2.57071 1.37264V3.4838C3.8468 2.18132 5.62558 1.37264 7.5943 1.37264C10.6581 1.37264 13.2619 3.33115 14.2269 6.0614C14.4118 6.58458 14.1376 7.15859 13.6144 7.34351C13.0912 7.52842 12.5172 7.25421 12.3323 6.73104C11.6422 4.77854 9.78003 3.38207 7.5943 3.38207C5.95165 3.38207 4.49177 4.17079 3.57478 5.3915H6.58958C7.14447 5.3915 7.5943 5.84133 7.5943 6.39622C7.5943 6.95111 7.14447 7.40094 6.58958 7.40094H1.566C1.01111 7.40094 0.561279 6.95111 0.561279 6.39622V1.37264C0.561279 0.817747 1.01111 0.36792 1.566 0.36792ZM1.5742 9.4678C2.09737 9.28289 2.67139 9.5571 2.85631 10.0803C3.54642 12.0328 5.40857 13.4292 7.5943 13.4292C9.23694 13.4292 10.6968 12.6405 11.6138 11.4198L8.59902 11.4198C8.04413 11.4198 7.5943 10.97 7.5943 10.4151C7.5943 9.8602 8.04413 9.41037 8.59902 9.41037H13.6226C13.8891 9.41037 14.1446 9.51623 14.333 9.70465C14.5215 9.89307 14.6273 10.1486 14.6273 10.4151V15.4387C14.6273 15.9936 14.1775 16.4434 13.6226 16.4434C13.0677 16.4434 12.6179 15.9936 12.6179 15.4387V13.3275C11.3418 14.63 9.56302 15.4387 7.5943 15.4387C4.53051 15.4387 1.92674 13.4802 0.961731 10.7499C0.776816 10.2267 1.05103 9.65272 1.5742 9.4678Z"
                                                    fill="#4D9841" />
                                            </svg>
                                        </button>
                                        <a href="/admin/pelanggaran-siswa/print/{{ $pelanggaran->id }}"
                                            class="border border-blue-500 p-2 rounded-lg h-10 w-10 text-center hover:bg-blue-500 group">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    class="group-hover:fill-white"
                                                    d="M5 4V7H4C2.89543 7 2 7.89543 2 9V12C2 13.1046 2.89543 14 4 14H5V16C5 17.1046 5.89543 18 7 18H13C14.1046 18 15 17.1046 15 16V14H16C17.1046 14 18 13.1046 18 12V9C18 7.89543 17.1046 7 16 7H15V4C15 2.89543 14.1046 2 13 2H7C5.89543 2 5 2.89543 5 4ZM13 4H7V7H13V4ZM13 12H7V16H13V12Z"
                                                    fill="#2B66E4" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop Up Modal -->
    <div id="tambah-pelanggaran" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="tambah-pelanggaran">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">
                        Tambah Pelanggaran Siswa
                    </h3>
                    <form action="/admin/pelanggaran-siswa" method="POST">
                        @csrf
                        <div class="grid">
                            <input type="text" name="user_id" class="hidden" value="{{ auth()->user()->id }}">
                            <div class="mt-3 mb-3 w-full">
                                <label for="select-state">NIS Siswa</label>
                                <select id="select-state" name="student_id" class="mt-3"
                                    placeholder="Pick a state...">
                                    <option value="">Select a state...</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->nis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3 mb-3 w-full">
                                <label for="select-state">Kategori Pelanggaran</label>
                                <select id="select-state" name="kategori_id" class="mt-3"
                                    placeholder="Pick a state...">
                                    <option value="">Select a state...</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-[#916BBF] hover:bg-[#C996CC] hover:text-[#1C0C5B] font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                            Tambah Pelanggaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($pelanggarans as $pelanggaran)
        <div id="edit-{{ $loop->index }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="edit-{{ $loop->index }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6">
                        <h3 class="mb-4 text-xl font-medium text-gray-900">
                            Edit Pelanggaran
                        </h3>
                        <form action="/admin/pelanggaran-siswa/{{ $pelanggaran->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="grid">
                                <div class="mt-3 mb-3 w-full">
                                    <label for="select-state">NIS Siswa</label>
                                    <select id="select-state" name="student_id" class="mt-3"
                                        placeholder="Pick a state...">
                                        <option value="{{ $pelanggaran->student->id }}">{{ $pelanggaran->student->nis }}
                                        </option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->nis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 mb-3 w-full">
                                    <label for="select-state">Kategori Pelanggaran</label>
                                    <select id="select-state" name="kategori_id" class="mt-3"
                                        placeholder="Pick a state...">
                                        <option value="{{ $pelanggaran->kategori->id }}">
                                            {{ $pelanggaran->kategori->name }}
                                        </option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white bg-[#916BBF] hover:bg-[#C996CC] hover:text-[#1C0C5B] font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                Edit Pelanggaran
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Pop Up Modal -->
@endsection
