@extends('layouts.crud')
@section('container')
    <h3 class="mb-4 text-xl font-medium text-gray-900">
        Edit Siswa</h3>
    @error('nis')
        <span id="badge-dismiss-red"
            class="inline-flex items-center py-1 px-2 mr-2 mb-5 text-sm font-medium text-red-800 bg-red-100 rounded">
            {{ $message }}
            <button type="button"
                class="inline-flex items-center p-0.5 ml-2 text-sm text-red-400 bg-transparent rounded-sm hover:bg-red-200 hover:text-red-900 dark:hover:bg-red-300 dark:hover:text-red-900"
                data-dismiss-target="#badge-dismiss-red" aria-label="Remove">
                <svg aria-hidden="true" class="w-3.5 h-3.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Remove badge</span>
            </button>
        </span>
    @enderror
    @error('the_class_id')
        <span id="badge-dismiss-red"
            class="inline-flex items-center py-1 px-2 mr-2 mb-5 text-sm font-medium text-red-800 bg-red-100 rounded">
            {{ $message }}
            <button type="button"
                class="inline-flex items-center p-0.5 ml-2 text-sm text-red-400 bg-transparent rounded-sm hover:bg-red-200 hover:text-red-900 dark:hover:bg-red-300 dark:hover:text-red-900"
                data-dismiss-target="#badge-dismiss-red" aria-label="Remove">
                <svg aria-hidden="true" class="w-3.5 h-3.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Remove badge</span>
            </button>
        </span>
    @enderror
    <form action="/admin/edit-siswa/{{ $student->id }}" method="POST">
        @method('put')
        @csrf
        <div class="grid mt-3">
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="nis" id="m=nisn"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#1C0C5B] peer"
                    placeholder=" " required="" value="{{ $student->nis }}" />
                <label for="nisn"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-[#1C0C5B] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NIS</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="name" id="nama_siswa"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#1C0C5B] peer"
                    placeholder=" " required="" value="{{ $student->name }}" />
                <label for="nama_siswa"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-[#1C0C5B] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                    Siswa</label>
            </div>
            <div class="mb-3 w-full">
                <label for="select-state">Pilih Kelas</label>
                <select id="select-state" class="mt-3" name="the_class_id" placeholder="Pick a class...">
                    <option
                        value="@if ($student->class != null) {{ $student->class->id }} @else Tidak Memiliki Kelas @endif">
                        @if ($student->class != null)
                            {{ $student->class->name }}
                        @else
                            Tidak Memiliki Kelas
                        @endif
                    </option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit"
            class="text-white bg-[#916BBF] hover:bg-[#C996CC] hover:text-[#1C0C5B] font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
            Edit Siswa
        </button>
    </form>
@endsection
