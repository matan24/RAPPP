<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class DataKaryawanController extends Controller
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
    public function karyawan()
    {
        $data = Data::all();
        return view('admin.input3.karyawan', compact('data'));
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
            'lahir' => 'required',
            'tanggal' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'status' => 'required',

        ]);

        $data = Data::create([

            'nama' => $request->nama,
            'lahir' => $request->lahir,
            'tanggal' => $request->tanggal,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'status' => $request->status,

        ]);

        return redirect()->route('admin.input3.karyawan')->with('status', 'Karyawan berhasil diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function detailkaryawan()
    {
        $data = Data::all();
        return view('admin.input3.detailkaryawan', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function editkaryawan(Data $data)
    {
        return view('admin.input3.editkaryawan', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Data::where("id", $id)
        ->update([

            'nama' => $request->nama,
            'lahir' => $request->lahir,
            'tanggal' => $request->tanggal,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'status' => $request->status,

        ]);
      
        return redirect()->route('admin.input3.detailkaryawan', $id)->with('status', 'Informasi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        $data->delete();
        return redirect()->route('admin.input3.detailkaryawan')->with('status', 'Data Berhasil dihapus!');
    }
}
