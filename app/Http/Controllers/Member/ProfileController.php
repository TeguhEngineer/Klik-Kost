<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.Member.Profile.index',[
            'dataUser'      =>User::where('id', auth()->user()->id)->first(),
            'data'      =>User::where('id', auth()->user()->id)->get()
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
    public function update(Request $request, $id)
    {
        // dd(request()->all());
        $ValidateData = $request->validate([    
            'name'      => 'required',
            // 'no_tlp'    => 'required|min:12|max:13|unique:users',
            'no_tlp'    => [
                'required',
                'min:12',
                'max:13',
                Rule::unique('users')->ignore($id, 'id')
            ]
        ]);

        User::find($id)->update($ValidateData);
        return back()->with('edit','');
    }

    public function edit_password(Request $request, $id)
    {   
        // dd(request()->all());   
        $validateData = $request->validate([
            'password'          => 'required|min:8',
            'password_confirmation'        => 'required|same:password',
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        User::find($id)->update($validateData);
        return redirect('/profil')->with('edit-password','');
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
