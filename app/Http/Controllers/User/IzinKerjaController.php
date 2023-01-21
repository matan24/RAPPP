<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Http\Request;

class IzinKerjaController extends Controller
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
    public function createizin()
    {
        $izin = Izin::all();
        return view('user.input4.createizin', compact('izin'));
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

            'surat_sakit' => 'file'

        ]);

        if($request->hasFile('surat_sakit')) {
            $filepath = $request->file('surat_sakit')->store('surat-sakit', 'public');
        }

        $izin = Izin::create([

            'nama' => $request->nama,
            'divisi_kerja' => $request->divisi_kerja,
            'surat_sakit' => $filepath,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'keterangan_sakit' => "Diproses",

        ]);

        return redirect()->route('user.input4.createizin')->with('status', 'Data berhasil diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Izin  $izin
     * @return \Illuminate\Http\Response
     */
    public function detailizin()
    {
        $izin = Izin::all();
        return view('user.input4.detailizin', compact('izin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Izin  $izin
     * @return \Illuminate\Http\Response
     */
    public function edit(Izin $izin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Izin  $izin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Izin $izin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Izin  $izin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Izin $izin)
    {
        //
    }
}
