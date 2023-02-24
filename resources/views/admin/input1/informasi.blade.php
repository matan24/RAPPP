@extends('layouts.admin')

@section('title', 'Informasi admin | April Group')

@section('container')

       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Update Informasi admin</h1>
        <p class="mb-4">Kami akan selalu memberikan informasi terbaru</p>

                    <!-- Custom styles for this page -->
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-4">
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                        @foreach ( $informasi as $item )
                        <a href="{{ Storage::url($item->surat) }}" class="btn btn-info">Download Informasi</a>
                        <br>
                        @endforeach
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" id="example2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Informasi</th>
                                <th>Keterangan pekerjaan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informasi as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->judul }}</td>
                                <td>{!! $item->keterangan_pekerjaan !!}</td>
                                <td>{{ $item->tanggal }}</td>
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