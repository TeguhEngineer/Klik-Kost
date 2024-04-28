<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\detailFasilitas;
use App\Models\fasilitas;
use App\Models\kost;
use App\Models\User;
use Illuminate\Http\Request;

class FasilitaskosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = detailFasilitas::whereHas('kost', function ($query) {
            $query->where('user_id', auth()->user()->id);
        });


        $idkos = kost::where('user_id', auth()->user()->id);
        return view('page.Member.Fasilitaskos.index', [
            'cekStatus'      =>User::where('id', auth()->user()->id)->first(),
            'dataFasilitas'     =>fasilitas::where('kost_id', null)->get(),
            'Fasilitas'         =>$fasilitas->get(),
            'idkos'             =>$idkos->first(),
            'cekdataKos'        =>kost::where('user_id',auth()->user()->id)->first()
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
        if ($request->insert_type == 'select') {
            $request->validate([
                'kost_id'   => 'required',
                'fasilitas_id' => 'required'
            ]);
    
            $kost = $request->input('kost_id');
            $fasilitas = $request->input('fasilitas_id');
            foreach ($fasilitas as $fasilitasItem) {
                detailFasilitas::updateOrCreate([
                    'kost_id' => $kost,
                    'fasilitas_id' => $fasilitasItem,
                ]);
            }
        } else {

            $validateData = $request->validate([
                'kost_id'   => 'required',
                'nama_fas'  => 'required'
            ]);
            // dd($validateData);
            $fasilitas = fasilitas::updateOrCreate($validateData);

            detailFasilitas::updateOrCreate([
                'kost_id' => $request->kost_id,
                'fasilitas_id' => $fasilitas->id,
            ]);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $detailFasilitas = detailFasilitas::find($id);
        if ($detailFasilitas->fasilitas->kost_id != null) {
            $detailFasilitas->fasilitas->delete();
        }
        $detailFasilitas->delete();
        return back()->with('delete','');
    }
}
