@extends('layouts.main')
@section('container')
    @include('components.user.navbar')
    <div class="m-10 flex">
        <div class="border border-gray-500 rounded-lg w-fit m-auto p-5">
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
            <h3 class="mb-4 text-xl font-medium text-gray-900">
                Tambah Pelanggaran Siswa
            </h3>
            <form action="/admin/pelanggaran-siswa" method="POST">
                @csrf
                <div class="grid">
                    <input type="text" name="user_id" class="hidden" value="{{ auth()->user()->id }}">
                    <div class="mt-3 mb-3 w-full">
                        <label for="select-state">NIS Siswa</label>
                        <select id="select-state" name="student_id" class="mt-3" placeholder="Pick a state...">
                            <option value="">Select a state...</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->nis }}</option>
                            @endforeach
                        </select>
                        <h1 class="text-xs text-red-500"><span id="student_name_pelanggaran"></span></h1>
                    </div>
                    <div class="mt-3 mb-3 w-full">
                        <label for="select-state">Kategori Pelanggaran</label>
                        <select id="select-state" name="kategori_id" class="mt-3" placeholder="Pick a state...">
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
@endsection
