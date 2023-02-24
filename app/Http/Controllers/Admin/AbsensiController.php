<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }

    public function createabsen()
    {
        $this->timeZone('Asia/Jakarta'); 
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        //mencari data user dan tanggal absen tertentu 
        $cek_absensi = Absensi::where(['user_id' => $user_id, 'date' => $date])->get()->first();

        //1. membuat logic jika user belum absen pada hari ini maka btnIn enable, dan jika sudah absen maka btnOut disable
        //2. membuat logic apabila user belum absen keluar maka btnOut enable dan btnIn disable
        //3. membuat logic jika jika user sudah absen masuk dan keluar maka disable btnIn dan btnOut  
        if (is_null($cek_absensi)) {
            $pesan = array(
                "status" => "Anda belum mengisi absensi..!",
                "btnIn" => "",
                "btnOut" => "disabled"
            );
        } elseif ($cek_absensi->time_out == NULL) {
            $pesan = array(
                "status" => "Jangan lupa absensi keluar..!",
                "btnIn" => "disabled",
                "btnOut" => ""
            );
        } else {
            $pesan = array(
                "status" => "Absensi hari ini telah selesai..!",
                "btnIn" => "disabled",
                "btnOut" => "disabled"
            );
        }

        $absensi = Absensi::selectRaw("
        absensi.user_id as user_id,
        absensi.date as date,
        absensi.time_in as time_in,
        absensi.time_out as time_out,
        absensi.note as note
        ")
        ->orderBy('date', 'desc')
        ->get();
        return view('admin.input10.createabsen', compact('absensi', 'pesan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function absenmasuk(Request $request)
    {
        $this->timeZone('Asia/Jakarta');
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $note = $request->note;

        //membuat logic dimana user hanya bisa absen satu kali
        $absensi = new Absensi;

        $cek_double = $absensi->where(['date' => $date, 'user_id' => $user_id])->count();
            if ($cek_double > 0) {
                return redirect()->back();
            }
        Absensi::create([
            'user_id' => $user_id,
            'date' => $date,
            'time_in' => $time,
            'note' => $note,
            
        ]);

        return redirect()->back();
        return $request->all();

    }

    public function absenkeluar(Request $request)
    { 
        $this->timeZone('Asia/Jakarta');
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $note = $request->note;
                                
        //cari data yg tanggalnya hari ini dgn user_id yg sekarang login dan update waktunya
        Absensi::where(['date' => $date, 'user_id' => $user_id])
            ->update([
                'time_out' => $time,
                'note' => $note
        ]);

        return redirect()->back();
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
