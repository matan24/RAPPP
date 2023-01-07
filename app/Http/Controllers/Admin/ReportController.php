<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Laporan;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        $laporan = Laporan::all();
        return view('admin.input4.laporankaryawan', compact('laporan'));
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
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function editreport($id)
    {
        $laporan = Laporan::find($id);
        return view('admin.input4.editreport', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Laporan::where("id", $id)
        ->update([
      
            'status_laporan' => $request->status_laporan,
            'keterangan_laporan' => $request->keterangan_laporan,

        ]);
      
        return redirect()->route('admin.input4.laporankaryawan', $id)->with('status', 'Laporan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('admin.input4.laporankaryawan')->with('status', 'Data Berhasil dihapus!');
    }
}
