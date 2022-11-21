<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
    public function create_user(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|min:5',
            'password' => 'required|min:5|max:10',
            'image' => 'image|file|max:1000',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('profil-img');
        }

        $validatedData['role_id'] = "0";
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/admin/daftar-user')->with('success', 'Anda Berhasil Menambah User');
    }

    public function create_admin(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|min:5',
            'password' => 'required|min:5|max:10',
            'image' => 'image|file|max:255',
        ]);
        
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('profil-img');
        }

        $validatedData['role_id'] = "1";
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/admin/daftar-admin')->with('success', 'Anda Berhasil Menambah Admin');
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
    public function edit(Request $request, User $user)
    {
        if($request->username == $user->username){
            $validatedData['username'] = $request->username;
        }else{
            $validatedData = $request->validate([
                'username' => 'required|unique:users|min:5',
            ]);
        }
        if($request->password != null){
            $validatedData = $request->validate([
            'password' => 'required|min:5|max:10',
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        if($request->file('image')){
            $validatedData = $request->validate([
                'image' => 'image|file|max:1000',
            ]);
            $validatedData['image'] = $request->file('image')->store('profil-img');
        }
        User::where('id', $user->id)->update($validatedData);
        return redirect(url()->previous())->with('success', 'Anda Berhasil Mengedit ' . $user->username);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect(url()->previous())->with('success', 'Anda Berhasil Menghapus '. $user->username);
    }
}
