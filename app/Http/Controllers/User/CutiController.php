<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
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
    public function createcuti()
    {
        $cuti = Cuti::all();
        return view('user.input5.createcuti', compact('cuti'));
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
            
            'surat_cuti' => 'file',
            
        ]);

        if($request->file('surat_cuti')) {
            $filepath = $request->file('surat_cuti')->store('file_cuti', 'public');
        }


        $cuti = Cuti::create([

            'nama' => $request->nama,
            'divisi_kerja' => $request->divisi_kerja,
            'wilayah_kerja' => $request->wilayah_kerja,
            'surat_cuti' => $filepath,
            'hp' => $request->hp,
            'keterangan_cuti' => "Diproses",

        ]);

        return redirect()->route('user.input5.createcuti')->with('status', 'Data berhasil diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function detailcuti(Cuti $cuti)
    {
        $cuti = Cuti::all();
        return view('user.input5.detailcuti', compact('cuti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuti $cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuti $cuti)
    {
        //
    }
}
