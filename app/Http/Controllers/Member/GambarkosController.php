<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\gambar;
use App\Models\kost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GambarkosController extends Controller
{
    public function index()
    {
        $gambar = gambar::whereHas('kost', function ($query) {
            $query->where('user_id', auth()->user()->id);
        });

        $idkos = kost::where('user_id', auth()->user()->id);

        return view('page.Member.Gambarkos.index', [
            'cekStatus' => User::where('id', auth()->user()->id)->first(),
            'idkos' => $idkos->first(),
            'gambar' => $gambar->get(),
        ]);
    }

    public function gambar(Request $request)
    {
        // dd(request()->all());
        $kost = $request->input('kost_id');
        $files = $request->file('files');


        $request->validate([
            'kost_id' => 'required',
            'files.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072', // maksimal 4MB
            // 'files' => 'max:2',
        ]);
        $jumlahGambarsudahAda = gambar::where('kost_id', $kost)->count();
        $jumlahGambarDiInput = count($request->file('files'));
        // dd($jumlahGambarDiInput);
        if ($jumlahGambarDiInput + $jumlahGambarsudahAda > 5) {
            return back()->with('gambar','');
        }

        foreach ($files as $multifiles) {
            if ($request->hasfile('files')) {

                $name = hexdec(uniqid());
                $extension = strtolower($multifiles->getClientOriginalExtension());
                $filenamesimpan = $name . '.' . $extension;
                $multifiles->move('galleryKost', $filenamesimpan);
                gambar::create([
                    'kost_id' => $kost,
                    'url' => $filenamesimpan,
                ]);
            }
        }
        return back()->with('create','');
    }

    public function delete_gambar($id) {
        $gambar = gambar::find($id);
        $gambar->delete();
        File::delete(public_path('/galleryKost/'.$gambar->url));
        return back()->with('delete','');
        
    }
}
