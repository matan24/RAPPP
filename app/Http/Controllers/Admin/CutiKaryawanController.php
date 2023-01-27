<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datacuti()
    {
        $cuti = Cuti::all();
        return view('admin.input8.datacuti', compact('cuti'));
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
    public function editcuti($id)
    {
        $cuti = Cuti::find($id);
        return view('admin.input8.editcuti', compact('cuti'));
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
        Cuti::where("id", $id)
        ->update([

            'keterangan_cuti' => $request->keterangan_cuti,

        ]);

        return redirect()->route('admin.input8.datacuti', $id)->with('status', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        return redirect()->route('admin.input8.datacuti')->with('status', 'Data Berhasil dihapus!');
    }
}
