@extends('layouts.user')

@section('title', 'Input Cuti Kerja | April Group')

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
              <br>
              <a href="{{ route('user.input5.detailcuti') }}" class="btn btn-info">Detail Data</a>
              <br>
                <form action="{{ route('user.input5.createcuti.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    @if (session('status'))
                        <div class="alert alert-primary">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <div class="mb-3 row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama lengkap</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" id="nama">
                      </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="divisi_kerja" class="col-sm-2 col-form-label">Divisi kerja</label>
                        <div class="col-sm-8">
                            <select id="divisi_kerja" name="divisi_kerja" class="form-control custom-select">
                                <option selected disabled>Pilih</option>
                                <option>
                                  Back-end Developer
                                </option>
                                <option>
                                  Front-end Developer
                                </option>
                                <option>
                                  IT Support
                                </option>
                                <option>
                                  Desktop Support
                                </option>
                                <option>
                                  Mechanical Technician
                                </option>
                                <option>
                                  Project Trainee Engineer, Procurement
                                </option>
                                <option>
                                  Sr. Process Engineer,Paper Impv.,Paper
                                </option>
                                <option>
                                  PLC Specialist,SS,Shipping
                                </option>
                                <option>
                                  PTE, Instrument, BM1, PMO
                                </option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="wilayah_kerja" class="col-sm-2 col-form-label">Wilayah kerja</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="wilayah_kerja" id="wilayah_kerja">
                        </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="surat_cuti" class="col-sm-2 col-form-label">Surat cuti</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control" name="surat_cuti" id="surat_cuti">
                      </div>
                  </div>

                    <div class="mb-3 row">
                        <label for="hp" class="col-sm-2 col-form-label">WhatsApp/HP</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="hp" id="hp">
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