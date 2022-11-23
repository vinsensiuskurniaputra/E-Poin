<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Student;
use App\Models\Kategori;
use App\Models\TheClass;
use Illuminate\Http\Request;
use App\Models\DaftarPelanggaran;

class MyController extends Controller
{
    public function guest()
    {    
        return view('user.home', [
            'title' => 'Home',
            'kategoris' => Kategori::with('daftar_pelanggaran')->get()->sortByDesc(function($kategori){
                return $kategori->daftar_pelanggaran->count();
            }),
            'students' => Student::all()->sortByDesc(function($student){
                $name = [];
                foreach($student as $siswa){
                    $poin = 0;
                    foreach($student->daftar_pelanggaran as $pelanggar){
                        $poin += $pelanggar->kategori->poin;
                    }
                    $name [] = $poin;
                }
                return $name;
            }),
        ]);
    }

    public function guest_about()
    {    
        return view('user.about', [
            'title' => 'About',
        ]);
    }
    //Admin
    public function login()
    {    
        return view('admin.login', [
            'title' => 'Login'
        ]);
    }

    public function home()
    { 
        return view('admin.home', [
            'title' => 'Home',
            'kategoris' => Kategori::with('daftar_pelanggaran')->get()->sortByDesc(function($kategori){
                return $kategori->daftar_pelanggaran->count();
            })->take(3),
            'students' => Student::all()->sortByDesc(function($student){
                $name = [];
                foreach($student as $siswa){
                    $poin = 0;
                    foreach($student->daftar_pelanggaran as $pelanggar){
                        $poin += $pelanggar->kategori->poin;
                    }
                    $name [] = $poin;
                }
                return $name;
            }),
            'role' => Role::all(),
        ]);
    }

    public function ketegori_pelanggaran()
    {    
        $kategori = Kategori::all();

        if (request('search')){
            $kategori = $kategori->where('name', 'LIKE', request('search'));
        }

        return view('admin.kategori-pelanggaran', [
            'title' => 'Kategori Pelanggaran',
            'kategoris' => $kategori->sortByDesc('poin'),
        ]);
    }

    public function pelanggaran_siswa()
    {    
        return view('admin.pelanggaran-siswa', [
            'title' => 'Pelanggaran Siswa',
            'pelanggarans' => DaftarPelanggaran::all(),
            'students' => Student::all(),
            'kategoris' => Kategori::all(),
        ]);
    }

    public function daftar_kelas()
    {    
        return view('admin.daftar-kelas', [
            'title' => 'Daftar Kelas',
            'classes' => TheClass::all()
        ]);
    }

    public function daftar_siswa()
    {    
        return view('admin.daftar-siswa', [
            'title' => 'Daftar Siswa',
            'students' => Student::all()->sortBy('nis'),
            'classes' => TheClass::all(),
        ]);
    }
    public function edit_siswa(Student $student)
    {    
        return view('admin.edit-siswa', [
            'title' => 'Daftar Siswa',
            'student' => Student::all()->where('id', $student->id)->first(),
            'classes' => TheClass::all(),
        ]);
    }

    public function daftar_user()
    {    
        return view('admin.daftar-user', [
            'title' => 'Daftar User',
            'users' => User::all()->where('role_id', '0'),
        ]);
    }

    public function daftar_admin()
    {    
        return view('admin.daftar-admin', [
            'title' => 'Daftar Admin',
            'users' => User::all()->where('role_id', '1'),
        ]);
    }



    //User

    public function user_home(){
        return view('user.home', [
            'title' => 'Home',
            'kategoris' => Kategori::with('daftar_pelanggaran')->get()->sortByDesc(function($kategori){
                return $kategori->daftar_pelanggaran->count();
            })->take(3),
            'students' => Student::all()->sortByDesc(function($student){
                $name = [];
                foreach($student as $siswa){
                    $poin = 0;
                    foreach($student->daftar_pelanggaran as $pelanggar){
                        $poin += $pelanggar->kategori->poin;
                    }
                    $name [] = $poin;
                }
                return $name;
            }),
            'role' => Role::all(),
        ]);
    }

    public function user_tambah_pelanggaran(){
        return view('user.tambah-pelanggaran', [
            'title' => 'Tambah Pelanggaran',
            'students' => Student::all(),
            'kategoris' => Kategori::all(),
        ]);
    }

    public function user_history(){
        return view('user.history', [
            'title' => 'History',
            'pelanggarans' => DaftarPelanggaran::all()->where('user_id', auth()->user()->id),
            'students' => Student::all(),
            'kategoris' => Kategori::all(),
        ]);
    }

    public function user_settings(){
        return view('user.settings', [
            'title' => 'Settings',
            'user' => User::all()->where('id', auth()->user()->id)->first(),
        ]);
    }
}
