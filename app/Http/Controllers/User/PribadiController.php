<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pribadi;
use Illuminate\Http\Request;

class PribadiController extends Controller
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
    public function createdata()
    {
        $pribadi = Pribadi::all();
        return view('user.input2.createdata', compact('pribadi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'image' => 'image|file'

        ]);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('post-images', 'public');
        }

        $pribadi = Pribadi::create([

            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'gender' => $request->gender,
            'status_pribadi' => $request->status_pribadi,
            'image' => $path,
            'jabatan' => $request->jabatan,
            'wilayah' => $request->wilayah,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'data_lengkap' => "Diproses",

        ]);

        return redirect()->route('user.input2.createdata')->with('status', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pribadi  $pribadi
     * @return \Illuminate\Http\Response
     */
    public function detaildata()
    {
        $pribadi = Pribadi::all();
        return view('user.input2.detaildata', compact('pribadi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pribadi  $pribadi
     * @return \Illuminate\Http\Response
     */
    public function editdata(Pribadi $pribadi)
    {
        return view('user.input2.editdata', compact('pribadi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pribadi  $pribadi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'image' => 'image|file'

        ]);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('post-images', 'public');
        }

        Pribadi::where("id", $id)
        ->update([

            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'gender' => $request->gender,
            'status_pribadi' => $request->status_pribadi,
            'image' => $path,
            'jabatan' => $request->jabatan,
            'wilayah' => $request->wilayah,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'data_lengkap' => $request->data_lengkap,

        ]);

        return redirect()->route('user.input2.detaildata', $id)->with('status', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pribadi  $pribadi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pribadi $pribadi)
    {
        $pribadi->delete();
        return redirect()->route('user.input2.detaildata')->with('status', 'Data berhasil dihapus!');
    }
}
