<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
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
    public function createinformasi()
    {
        $informasi = Informasi::all();
        return view('admin.input2.createinformasi', compact('informasi'));
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

            'judul' => 'required',
            'keterangan_pekerjaan' => 'required',
            'tanggal' => 'required',
            'status_pekerjaan' => 'required',

        ]);

        $informasi = Informasi::create([

            'judul' => $request->judul,
            'keterangan_pekerjaan' => $request->keterangan_pekerjaan,
            'tanggal' => $request->tanggal,
            'status_pekerjaan' => $request->status_pekerjaan,

        ]);

        return redirect()->route('admin.input2.createinformasi')->with('status', 'Informasi berhasil diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function detailinformasi()
    {
        $informasi = Informasi::all();
        return view('admin.input2.detailinformasi', compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function editinformasi(Informasi $informasi)
    {
        return view('admin.input2.editinformasi', compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Informasi::where("id", $id)
        ->update([

            'judul' => $request->judul,
            'keterangan_pekerjaan' => $request->keterangan_pekerjaan,
            'tanggal' => $request->tanggal,
            'status_pekerjaan' => $request->status_pekerjaan,

        ]);
      
        return redirect()->route('admin.input2.detailinformasi', $id)->with('status', 'Informasi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {
        $informasi->delete();
        return redirect()->route('admin.input2.detailinformasi')->with('status', 'Data informasi Berhasil dihapus!');
    }
}
