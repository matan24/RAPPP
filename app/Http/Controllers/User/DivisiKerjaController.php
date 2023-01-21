<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailkerja()
    {
        $divisi = Divisi::all();
        return view('user.input3.detailkerja', compact('divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createkerja()
    {
        return view('user.input3.createkerja');
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

            'nama' => 'required',
            'divisi_kerja' => 'required',
            'pindah_divisi' => 'required',
            'alasan_pindah' => 'required',
            'surat' => 'file',
            'alamat' => 'required',
            
        ]);

        if($request->file('surat')) {
            $filepath = $request->file('surat')->store('file_surat', 'public');
        }


        $divisi = Divisi::create([

            'nama' => $request->nama,
            'divisi_kerja' => $request->divisi_kerja,
            'pindah_divisi' => $request->pindah_divisi,
            'alasan_pindah' => $request->alasan_pindah,
            'surat' => $filepath,
            'alamat' => $request->alamat,
            'berkas' => "Belum diperiksa",
            'keterangan_pindah' => "menunggu",

        ]);

        return redirect()->route('user.input3.createkerja')->with('status', 'Data berhasil diinput!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        //
    }
}
