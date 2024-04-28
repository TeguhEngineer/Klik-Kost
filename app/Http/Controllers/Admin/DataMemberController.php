<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kost;
use App\Models\User;
use Illuminate\Http\Request;

class DataMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datamember = User::where('role','member');
        return view('page.Admin.dataMember.index', [
            'datamember' => $datamember->get(),
            'dataKos'    => kost::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.Admin.dataMember.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $validateData['role'] = 'member';
        User::create($validateData);
        return redirect('/datamember')->with('create','');
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
        $validateData = $request->validate([
            'name'          => 'required',
            'no_tlp'        => 'required|min:12|max:13',
            'alamat_kost'   => 'required',
            'link_maps'     => 'required',
            'status'        => 'required'
        ]);
        User::find($id)->update($validateData);
        return back()->with('edit','');
    }

    public function edit_password(Request $request, $id) {
        // dd(request()->all());
        $validateData = $request->validate([
            'password'      => 'required|string|min:8|confirmed'
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        User::find($id)->update($validateData);
        return back()->with('edit-password','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('delete','');
    }
}
