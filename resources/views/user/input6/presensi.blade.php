@extends('layouts.user')

@section('title', 'Input Absensi Kerja Karyawan | April Group')

@section('container')

<script src="{{ asset('js/jam.js') }}"></script>
<style>
    #watch {

        color: rgb(253, 150, 65);
        position: absolute;
        z-index: 1;
        height: 40px;
        width: 700px;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        font-size: 10vw;
        -webkit-text-stroke: 30px rgb(210, 65, 36);
        text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
            4px 4px 20px rgba(210, 45, 26, 0.4),
            4px 4px 30px rgba(210, 25, 16, 0.4),
            4px 4px 40px rgba(210, 15, 06, 0.4);

    }

</style>

<body class="hold-transition sidebar-mini" onload="realtimeClock()">
    
 <!-- Begin Page Content -->
 <div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-4">
            <p class="alert alert-success" style="width: 36rem;">
                <b>HALAMAN PRESENSI</b>
            </p>
            <hr class="border border-dark">
            <div class="jumbotron jumbotron-fluid alert alert-success">
                <div class="">
                  <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <center>
                            <label id="clock" style="font-size: 100px; color: #0A77DE; -webkit-text-stroke: 3px #00ACFE;
                                       text-shadow: 4px 4px 10px #36D6FE,
                                       4px 4px 20px #36D6FE,
                                       4px 4px 30px #36D6FE,
                                       4px 4px 40px #36D6FE;">
                            </label>
                        </center>
                    </div>
                    <center>
                        <div class="form-group">
                            <button type="button" class="btn btn-warning btn-lg">Klik Untuk Absensi Masuk</button>
                        </div>
                    </center>
                  </form>                   
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
                            {{-- @foreach ($absensi as $item)
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
                            @endforeach --}}
                        </tbody>                                
                    </table>
                </div>
              </div>
             
        </div>
    </div>

</div>

</body>

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
