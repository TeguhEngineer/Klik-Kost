<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAdmin = User::where('role','admin');
        return view('page.Admin.dataAdmin.index', [
            'dataadmin' => $dataAdmin->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.Admin.dataAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $validateData = $request->validate([
            'name'          => 'required',
            'no_tlp'        => 'required|min:12|max:13|unique:users',
            'alamat_kost'   => 'required',
            'link_maps'     => 'required',
            'password'      => 'required',
            'password_confirmation' => 'required|same:password',
            'status'        => 'required',
            'role'          => 'required'
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        $validateData['status'] = 'aktif';
        $validateData['role'] = 'admin';
        User::create($validateData);
        return redirect('/dataadmin')->with('create','');
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
    public function update(Request $request, $id)
    {
        // Fitur dinonaktifkan
        // $validateData = $request->validate([
        //     'name'          => 'required',
        //     'no_tlp'        => 'required',
        // ]);
        // User::find($id)->update($validateData);
        // return back()->with('edit','');
    }

    // public function update_password(Request $request, $id)
    // {
    //     $validateData = $request->validate([
    //         'password'          => 'required',
    //         'password_confirmation'        => 'required|same:password',
    //     ]);
    //     $validateData['password'] = bcrypt($validateData['password']);
    //     User::find($id)->update($validateData);
    //     return redirect('/dataadmin')->with('edit-password','');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fitur dinonaktifkan
        // User::find($id)->delete();
        // return back()->with('delete','');
    }
}
