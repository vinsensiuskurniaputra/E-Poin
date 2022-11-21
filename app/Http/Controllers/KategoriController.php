<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Symfony\Component\HttpFoundation\Request;


class KategoriController extends Controller
{
    public function kategori(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'poin' => 'required|integer'
        ]);

        Kategori::create($validatedData);        
        return redirect('/admin/kategori-pelanggaran')->with('success', 'Anda Berhasil Menambah Kategori!');
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'poin' => 'required|integer'
        ]);

        Kategori::where('id', $kategori->id)->update($validatedData);        
        return redirect('/admin/kategori-pelanggaran')->with('success', 'Anda Berhasil Mengedit Kategori!');
    }

    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);        
        return redirect('/admin/kategori-pelanggaran')->with('success', 'Anda Berhasil Menghapus Kategori!');
    }
}
