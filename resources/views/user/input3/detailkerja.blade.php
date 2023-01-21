@extends('layouts.user')

@section('title', 'Detail Divisi Kerja Karyawan | April Group')

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
                        <br><br>
                        <div class="table-responsive">
                        <table class="table table-striped table-hover" id="example2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Divisi kerja</th>
                                    <th>Divisi yang dipilih</th>
                                    <th>Alasan pindah</th>
                                    <th>Surat keterangan pindah divisi kerja</th>
                                    <th>Alamat</th>
                                    <th>Status pindah divisi kerja</th>
                                    <th>Keterangan pindah divisi kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisi as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->divisi_kerja }}</td>
                                    <td>{{ $item->pindah_divisi }}</td>
                                    <td>{!! $item->alasan_pindah !!}</td>                
                                    <td><a href="{{ Storage::url($item->surat) }}" class="btn btn-info btn-lg"><i class="bi bi-eye-fill"></i></a></td> 
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->berkas }}</td>
                                    <td>{!! $item->keterangan_pindah !!}</td>      
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
