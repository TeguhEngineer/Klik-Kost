<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\areaKampus;
use App\Models\kecamatan;
use App\Models\kost;
use App\Models\User;
use Illuminate\Http\Request;

class InputDatakosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.Member.Datakos.index',[
            'cekStatus'      =>User::where('id', auth()->user()->id)->first(),
            'kecamatan'  =>kecamatan::all(),
            'areaKampus'  =>areaKampus::all(),
            'kost'        =>kost::where('user_id',auth()->user()->id)->first(),
            'dataKost'        =>kost::where('user_id',auth()->user()->id)->get()
        ]);
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
        // dd(request()->all());
        $validateData = $request->validate([
            'user_id'       => 'required',
            'area_id'       => 'nullable',
            'kecamatan_id'  => 'required',
            'nama_kost'     => 'required',
            'harga_kost'    => 'required',
            'tipe_kost'     => 'required',
            'jumlah_kost'   => 'required',
            'status_kost'   => 'required',
            'deskripsi'     => 'required'
        ]);
        kost::create($validateData);
        return back()->with('create','');
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
        // dd(request()->all());
        $validateData = $request->validate([
            'user_id'       => 'required',
            'area_id'       => 'nullable',
            'kecamatan_id'  => 'required',
            'nama_kost'     => 'required',
            'harga_kost'    => 'required',
            'tipe_kost'     => 'required',
            'jumlah_kost'   => 'required',
            'status_kost'   => 'required',
            'deskripsi'     => 'required'
        ]);
        kost::find($id)->update($validateData);

        $validasi = $request->validate([
            'link_maps'     => 'required',
            'alamat_kost'   => 'required'
        ]);
        User::where('id', auth()->user()->id)->update($validasi);
        return back()->with('edit','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
