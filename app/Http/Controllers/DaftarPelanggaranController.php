<?php

namespace App\Http\Controllers;

use \PDF;
use Illuminate\Http\Request;
use App\Models\DaftarPelanggaran;

class DaftarPelanggaranController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'kategori_id' => 'required',
            'user_id' => 'required',
        ]);

        DaftarPelanggaran::create($validatedData);
        return redirect( url()->previous() )->with('success', 'Anda Berhasil Membuat Pelanggaran');
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
    public function update(Request $request, DaftarPelanggaran $pelanggaran)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'kategori_id' => 'required',
        ]);

        DaftarPelanggaran::where('id', $pelanggaran->id)->update($validatedData);
        return redirect(url()->previous())->with('success', 'Anda Berhasil Mengedit Pelanggaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarPelanggaran $pelanggaran)
    {
        DaftarPelanggaran::destroy($pelanggaran->id);
        return redirect( url()->previous() )->with('success', 'Anda Berhasil Menghapus Pelanggaran');
    }

    public function each_print(DaftarPelanggaran $pelanggaran)
    {
        $pdf = PDF::loadView('admin.print-pdf', ['pelanggaran' => $pelanggaran]);
        return $pdf->stream('each_print.pdf');
    }
}
