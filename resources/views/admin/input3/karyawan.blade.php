@extends('layouts.admin')

@section('title', 'Input Karyawan | April Group')

@section('container')

       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-4">
                <h4 class="m-0 font-weight-bold text-primary">Tambah Karyawan</h4>

                <br>
                <a href="{{ route('admin.input3.detailkaryawan') }}" class="btn btn-info">Lihat Data Karyawan</a>

                <form action="{{ route('admin.input3.karyawan.store') }}" method="post">
                    @csrf
                    <br>
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
  
                    <div class="mb-3 row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama karyawan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" id="nama">
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                      <label for="lahir" class="col-sm-2 col-form-label">Tempat lahir</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="lahir" id="lahir">
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                      <label for="tanggal" class="col-sm-2 col-form-label">Tanggal lahir</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="jabatan" id="jabatan">
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="alamat" id="alamat">
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="hp" class="col-sm-2 col-form-label">WhatsApp/HP</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="hp" id="hp">
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status karyawan</label>
                        <div class="col-sm-8">
                            <select id="status" name="status" class="form-control custom-select">
                                <option selected disabled>Pilih</option>
                                <option>
                                  Aktif
                                </option>
                                <option>
                                  Non Aktif
                                </option>
                                <option>
                                  Dalam Masalah
                                </option>  
                            </select>
                        </div>
                    </div> 
        
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>    
                </form>
                <br>
            </div>
        </div>

    </div>


@endsection