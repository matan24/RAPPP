<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class TambahKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import_excel()
    {
        Excel::import(new UsersImport, request()->file('users'));

        return redirect()->back()->with('status', 'Karyawan berhasil Di tambahkan!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1()
    {
        $data = Data::all();
        return view('admin.input1.createkaryawan', compact('data'));
    }

}
