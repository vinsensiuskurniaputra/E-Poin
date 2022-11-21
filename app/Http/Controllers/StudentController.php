<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
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
            'nis' => 'required|unique:students|integer',
            'name' => 'required',
            'the_class_id' => 'required',
        ]);
        Student::create($validatedData);
        return redirect('/admin/daftar-siswa')->with('success', 'Anda Berhasih Menambahkan Siswa');
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
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'the_class_id' => 'required',
        ]);
        if($request->nis == $student->nis){
            $validatedData['nis'] = $student->nis;
        }else{
            $validatedData = $request->validate(['nis' => 'required|unique:students|integer']);
        }
        Student::where('id', $student->id)->update($validatedData);
        return redirect('/admin/daftar-siswa')->with('success', "Anda Berhasil Mengedit $student->name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/admin/daftar-siswa')->with('success','Anda Berhasil Menghapus Siswa' . $student->name);   
    }
}
