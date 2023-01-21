<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Http\Request;

class IzinSakitKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function izinsakit()
    {
        $izin = Izin::all();
        return view('admin.input6.izinsakit', compact('izin'));
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
     * @param  \App\Models\Izinsakit  $izinsakit
     * @return \Illuminate\Http\Response
     */
    public function show(Izinsakit $izinsakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Izinsakit  $izinsakit
     * @return \Illuminate\Http\Response
     */
    public function editizinsakit($id)
    {
        $izin = Izin::find($id);
        return view('admin.input6.editizinsakit', compact('izin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Izinsakit  $izinsakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Izin::where("id", $id)
            ->update([

            'keterangan_sakit' => $request->keterangan_sakit,

        ]);

        return redirect()->route('admin.input6.izinsakit', $id)->with('status', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Izinsakit  $izinsakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Izinsakit $izinsakit)
    {
        //
    }
}
