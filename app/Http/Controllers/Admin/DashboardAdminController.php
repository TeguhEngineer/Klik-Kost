<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kost;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index (){
        return view('page.Admin.Dashboard.index', [
            'countNonAktif'         =>User::where('status', 'non-aktif')->count(),
            'countAktif'         =>User::where('role', 'member')->where('status','aktif')->count(),
            'countAdmin'         =>User::where('role', 'admin')->count(),
            'countKos'         =>kost::all()->count(),
        ]);
    }


    public function profile() {
        return view('page.Admin.Profile.index', [
            'authAdmin'     =>User::where('id', auth()->user()->id)->first()
        ]);
    }

    public function edit_profile(Request $request, $id) {
        $validateData = $request->validate([
            'name'      => 'required',
            'no_tlp'    => 'required'
        ]);
        // dd(request()->all());
        User::find($id)->update($validateData);
        return back()->with('edit','');
    }

    public function edit_password(Request $request, $id) {
        $validateData = $request->validate([
            'password'          => 'required|string|min:8|confirmed',
        ]);
        // dd(request()->all());
        $validateData['password'] = bcrypt($validateData['password']);
        User::find($id)->update($validateData);
        return back()->with('edit-password','');
    }
}
