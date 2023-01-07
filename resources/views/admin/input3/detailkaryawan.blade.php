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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <a href="{{ route('admin.input3.editkaryawan', $item->id ) }}" class="btn btn-warning btn-lg mb-2"><i class="bi bi-pencil-fill"></i></a> 
                  
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


@endsection