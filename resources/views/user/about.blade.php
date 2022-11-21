@extends('layouts.main')
@section('container')
    @include('components.user.navbar')
    <div class="w-full bg-gray-900 p-5 text-white grid">
        <h1 class="text-center font-bold text-2xl">Tentang E - Poin</h1>
        <h1 class="text-center font-light w-full md:w-6/12 mx-auto mt-10">Web E - Poin adalah web yang dibuat oleh siswa SMK
            N 8
            Semarang
            dalam
            rangka PJBL.
            Tujuan dari pembuatan web E - Poin ini untuk mempermudah dalam pendataan pelanggaran siswa di sekolah.</h1>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#111827" fill-opacity="1"
            d="M0,288L15,266.7C30,245,60,203,90,181.3C120,160,150,160,180,138.7C210,117,240,75,270,80C300,85,330,139,360,133.3C390,128,420,64,450,42.7C480,21,510,43,540,74.7C570,107,600,149,630,149.3C660,149,690,107,720,128C750,149,780,235,810,229.3C840,224,870,128,900,117.3C930,107,960,181,990,213.3C1020,245,1050,235,1080,218.7C1110,203,1140,181,1170,149.3C1200,117,1230,75,1260,64C1290,53,1320,75,1350,117.3C1380,160,1410,224,1425,256L1440,288L1440,0L1425,0C1410,0,1380,0,1350,0C1320,0,1290,0,1260,0C1230,0,1200,0,1170,0C1140,0,1110,0,1080,0C1050,0,1020,0,990,0C960,0,930,0,900,0C870,0,840,0,810,0C780,0,750,0,720,0C690,0,660,0,630,0C600,0,570,0,540,0C510,0,480,0,450,0C420,0,390,0,360,0C330,0,300,0,270,0C240,0,210,0,180,0C150,0,120,0,90,0C60,0,30,0,15,0L0,0Z">
        </path>
    </svg>
    <div class="w-full bg-white p-5 text-gary-900 grid">
        <h1 class="text-center font-bold text-2xl">Fitur - Fitur</h1>
        <div class="text-center mt-5 text-lg grid gap-2">
            <h1>Melihat statistic top pelanggaran</h1>
            <h1>Tambah pelanggaran siswa</h1>
            <h1>History inputan pelanggaran</h1>
            <h1>Edit dan hapus pelanggaran yang diinputkan</h1>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#111827" fill-opacity="1"
            d="M0,96L16,122.7C32,149,64,203,96,208C128,213,160,171,192,138.7C224,107,256,85,288,96C320,107,352,149,384,144C416,139,448,85,480,58.7C512,32,544,32,576,26.7C608,21,640,11,672,42.7C704,75,736,149,768,192C800,235,832,245,864,234.7C896,224,928,192,960,202.7C992,213,1024,267,1056,266.7C1088,267,1120,213,1152,213.3C1184,213,1216,267,1248,282.7C1280,299,1312,277,1344,272C1376,267,1408,277,1424,282.7L1440,288L1440,320L1424,320C1408,320,1376,320,1344,320C1312,320,1280,320,1248,320C1216,320,1184,320,1152,320C1120,320,1088,320,1056,320C1024,320,992,320,960,320C928,320,896,320,864,320C832,320,800,320,768,320C736,320,704,320,672,320C640,320,608,320,576,320C544,320,512,320,480,320C448,320,416,320,384,320C352,320,320,320,288,320C256,320,224,320,192,320C160,320,128,320,96,320C64,320,32,320,16,320L0,320Z">
        </path>
    </svg>
    <div class="w-full bg-gray-900 p-5 text-white grid pb-64">
        <h1 class="text-center font-bold text-2xl">Ingin Mencobanya ?</h1>
        <h1 class="text-center font-light w-full md:w-6/12 mx-auto mt-10">Ayo Login untuk user dengan username : UserKu,
            password : UserKu.
        </h1>
        <h1 class="text-center font-light w-full md:w-6/12 mx-auto">Dan untuk admin dengan username : AdminKu,
            password : Adminku.
        </h1>
    </div>
@endsection
