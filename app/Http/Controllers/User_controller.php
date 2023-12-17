<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['listUser'] = User::all();

        return view('/User/index', $data);
    }




    public function create()
    {
        return view('/Config/addUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = floor(microtime(true) * 1000);
        $data['updated_at'] = floor(microtime(true) * 1000);

        DB::table('users')->insert($data);

        return redirect('/Config/userManagement')->with('createSuccess', "User berhasil di tambahkan.");
    }








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
    public function update(Request $request, $id)
    {
        //
    }





    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('/Config/userManagement')->with('deleteSuccess', "User berhasil di hapus.");
    }
}
