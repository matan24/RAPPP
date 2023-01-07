<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Informasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informasi()
    {
        $informasi = Informasi::all();
        return view('user.input1.informasi', compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createlaporan()
    {
        $laporan = Laporan::all();
        return view('user.input1.createlaporan', compact('laporan'));
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
            'jabatan' => 'required',
            'wilayah' => 'required',
            'laporan' => 'required',
            'alamat' => 'required',
            'hp' => 'required',

        ]);

        $laporan = Laporan::create([

            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'wilayah' => $request->wilayah,
            'laporan' => $request->laporan,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'status_laporan' => 0,
            'keterangan_laporan' => 0,

        ]);

        return redirect()->route('user.input1.createlaporan')->with('status', 'Laporan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function detaillaporan()
    {
        $laporan = Laporan::all();
        return view('user.input1.detaillaporan', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function editlaporan(Laporan $laporan)
    {
        return view('user.input1.editlaporan', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Laporan::where("id", $id)
        ->update([
            
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'wilayah' => $request->wilayah,
            'laporan' => $request->laporan,
            'alamat' => $request->alamat,
            'hp' => $request->hp,

        ]);
      
        return redirect()->route('user.input1.detaillaporan', $id)->with('status', 'Laporan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
