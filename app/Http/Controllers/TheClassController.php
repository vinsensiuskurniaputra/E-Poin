<?php

namespace App\Http\Controllers;

use App\Models\TheClass;
use Illuminate\Http\Request;

class TheClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        TheClass::create($validatedData);
        return redirect('/admin/daftar-kelas')->with('success', 'Anda Berhasil Menambah Kelas!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TheClass $kelas)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        TheClass::where('id', $kelas->id)->update($validatedData);
        return redirect('/admin/daftar-kelas')->with('success', 'Anda Berhasil Mengedit Kelas!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TheClass $kelas)
    {
     TheClass::destroy($kelas->id);
     return redirect('/admin/daftar-kelas')->with('success','Anda Berhasil Menghapus Kelas');   
    }
}
