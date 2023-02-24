@extends('layouts.admin')

@section('title', 'Data Karyawan | April Group')

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
                <h4 class="m-0 font-weight-bold text-primary">Data Karyawan</h4>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <a href="{{ route('admin.input3.karyawan') }}" class="btn btn-info">Kembali</a>
                    <br><br>
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama karyawan</th>
                                <th>Lahir</th>
                                <th>Tanggal lahir</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>WhatsApp/HP</th>
                                <th>Status karyawan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->lahir }}</td>
                                <td>{{ $item->tanggal }}</td>                
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->hp }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="">
                                   
                                    <button type="button" class="btn btn-info btn-lg mb-2" data-toggle="modal" data-target="#myModal"><i class="bi bi-pencil-square"></i></button>

                                    <div id="myModal" class="modal fade" role="dialog" tabindex="-1">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="container text-center">
                                                    <h5 class="modal-title">Update data karyawan</h5>   
                                                </div>                                                   
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <br>
                                            <div class="container">
                                            <form action="{{ route('update_karyawan', $item->id) }}" method="post">
                                                @method('patch')
                                                @csrf
                                                <div class="mb-3 row">
                                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="nama" id="nama"
                                                       value="{{ $item->nama }}">
                                                    </div>
                                                  </div>
                                
                                                  <div class="mb-3 row">
                                                    <label for="lahir" class="col-sm-2 col-form-label">Tempat</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="lahir" id="lahir"
                                                      value="{{ $item->lahir }}">
                                                    </div>
                                                  </div>
                                
                                                  <div class="mb-3 row">
                                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                                    <div class="col-sm-8">
                                                      <input type="date" class="form-control" name="tanggal" id="tanggal"
                                                      value="{{ $item->tanggal }}">
                                                    </div>
                                                  </div>
                              
                                                  <div class="mb-3 row">
                                                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="jabatan" id="jabatan"
                                                      value="{{ $item->jabatan }}">
                                                    </div>
                                                  </div>
                              
                                                  <div class="mb-3 row">
                                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="alamat" id="alamat"
                                                      value="{{ $item->alamat }}">
                                                    </div>
                                                  </div>
                              
                                                  <div class="mb-3 row">
                                                    <label for="hp" class="col-sm-2 col-form-label">WhatsApp/HP</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="hp" id="hp"
                                                      value="{{ $item->hp }}">
                                                    </div>
                                                  </div>
                                
                                                  <div class="mb-3 row">
                                                      <label for="status" class="col-sm-2 col-form-label">Status</label>
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
    
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary mb-4" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                                                </div>
                                            </form>
                                          </div>       
                                          </div>
                                        </div>
                                      </div>
                  
                                    <form action="{{ route('admin.input3.detailkaryawan.delete', $item->id ) }}" method="post">
                                      @method('delete')
                                      @csrf 
                                      <button type="submit" class="btn btn-danger btn-lg mr-2"><i class="bi bi-trash"></i></button>
                                    </form>
                  
                                </td>          
                            </tr>
                            @endforeach   
                        </tbody>                                
                    </table>
                </div>
            
            </div>
        </div>

    </div>


@endsection