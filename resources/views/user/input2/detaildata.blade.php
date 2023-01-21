@extends('layouts.user')

@section('title', 'Data Karyawan | April Group')

@section('container')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank"
                    href="{{ asset('admin2/https://datatables.net') }}">official DataTables documentation</a>.</p>
    
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-4">
                        @if (session('status'))
                            <div class="alert alert-info">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br>
                        <a href="{{ route('user.input2.createdata') }}" class="btn btn-info">Kembali</a>
                        <br><br>
                        <div class="table-responsive">
                        <table class="table table-striped table-hover" id="example2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama lengkap</th>
                                    <th>Tempat lahir</th>
                                    <th>Tanggal lahir</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Kartu tanda penduduk - KTP</th>
                                    <th>Jabatan</th>
                                    <th>Wilayah kerja</th>
                                    <th>Alamat</th>
                                    <th>WhatsApp/HP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pribadi as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tempat }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->gender }}</td>                
                                    <td>{{ $item->status_pribadi }}</td>
                                    <td><a href="{{ Storage::url($item->image) }}" class="btn btn-info btn-lg"><i class="bi bi-eye-fill"></i></a></td> 
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->wilayah }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->hp }}</td>
                                    <td class="">
                                        <a href="{{ route('user.input2.editdata', $item->id) }}" class="btn btn-warning btn-lg mb-2"><i class="bi bi-pencil-fill"></i></a> 
                      
                                        <form action="{{ route('user.input2.detaildata.delete', $item->id) }}" method="post">
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
@push('tablestyle')
    <link href="{{ asset('admin2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('tablescript')
      <!-- Bootstrap core JavaScript-->
      <script src="{{ asset('admin2/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
      <!-- Core plugin JavaScript-->
      <script src="{{ asset('admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  
      <!-- Custom scripts for all pages-->
      <script src="{{ asset('admin2/js/sb-admin-2.min.js') }}"></script>
  
      <!-- Page level plugins -->
      <script src="{{ asset('admin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('admin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  
      {{-- <!-- Page level custom scripts -->
      <script src="{{ asset('admin2/js/demo/datatables-demo.js') }}"></script> --}}

      <script>
        $(function () {
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 5,
            });
        });
    </script>

@endpush
