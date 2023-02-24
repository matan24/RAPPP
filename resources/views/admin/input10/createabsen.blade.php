@extends('layouts.admin')

@section('title', 'Input Absensi Kerja Karyawan | April Group')

@section('container')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-4">
            <p class="alert alert-success" style="width: 36rem;">
                <b>{{ $pesan['status'] }}</b>
            </p>
            <hr class="border border-dark">
            <div class="jumbotron jumbotron-fluid alert alert-success">
                <div class="">
                    <table class="table table-responsive">
                        <form action="{{ route('admin.input10.createabsen.absenmasuk') }}" method="post">
                            @csrf
                            <tr>
                                <td>
                                    <input type="text" name="note" class="form-control" style="width: 36rem;" placeholder="keterangan">
                                </td>
                                <td>
                                    <button type="submit" name="btnIn" class="btn btn-primary"
                                    {{ $pesan['btnIn'] }}>
                                        Absen masuk
                                    </button>
                                </td>
                            </tr>
                         </form>
                         <td>
                         <form action="{{ route('admin.input10.createabsen.absenkeluar') }}" method="post">
                           @csrf
                           <tr>
                            <td>
                                <input type="text" name="note" class="form-control" style="width: 36rem;" placeholder="keterangan">
                              </td>
                              <td>
                                <button type="submit" name="btnOut" class="btn btn-danger"
                                {{ $pesan['btnOut'] }}>
                                    Absen keluar
                                 </button>
                              </td>
                           </tr>

                        </form>     
                        </td>
                    </table>
                
                </div>
              </div>
             
        </div>
    </div>

</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-4">
            <p class="alert alert-success" style="width: 36rem;">
                <b>Riwayat absensi</b>
            </p>
            <hr class="border border-dark">
            <div class="jumbotron jumbotron-fluid alert alert-success">
                <div class="">
                    <table class="table table-bordered table-striped table-hover" id="example2" width="100%" cellspacing="0">
                        <thead>
                            @foreach ($absensi as $item)
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam masuk</th>
                                <th>Jam keluar</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->date }}</td>               
                                <td>{{ $item->time_in }}</td>               
                                <td>{{ $item->time_out }}</td>               
                                <td>{{ $item->note }}</td>               
                            </tr>
                            @endforeach
                        </tbody>                                
                    </table>
                </div>
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
