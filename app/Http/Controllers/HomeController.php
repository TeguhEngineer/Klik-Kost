<?php

namespace App\Http\Controllers;

use App\Models\gambar;
use App\Models\kost;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gambar = gambar::whereHas('kost', function ($query) {
            $query->where('user_id', auth()->user()->id);
        });
        return view('page.Member.Dashboard.index',[
            'cekStatus'      =>User::where('id', auth()->user()->id)->first(),
            'dataKost'        =>kost::where('user_id',auth()->user()->id)->first(),
            'gambar'         =>$gambar->get(),
            'cekdataKos'        =>kost::where('user_id',auth()->user()->id)->first()
        ]);

    }

    public function supportCS() {
        return view('page.Member.SupportCS.index');
    }
}
