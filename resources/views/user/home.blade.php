@extends('layouts.user')

@section('title', 'Home User | April Group')

@section('container')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-4">
            <p class="alert alert-primary" style="width: 36rem;" >
                <b>Kepada seluruh karyawan, wajib melengkapi data pribadi </b> <a href="{{ route('user.input2.createdata') }}"
                 class="btn btn-success btn-lg"><i class="bi bi-person-gear"></i></a>
            </p>
            <hr class="border border-primary">
            <div class="jumbotron jumbotron-fluid alert alert-primary">
                <div class="">
                    <p class="text-muted">
                        <b>- Lihat informasi terbaru</b> <a href="{{ route('user.input1.informasi') }}" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i></a>
                    </p>
                    <p class="text-muted">
                        <b>- Pengajuan pindah divisi kerja</b> <a href="{{ route('user.input3.createkerja') }}" class="btn btn-danger btn-lg"><i class="fas fa-plus"></i></a>
                    </p>
                    <p class="text-muted">
                        <b>- Izin tidak masuk bekerja</b> <a href="{{ route('user.input4.createizin') }}" class="btn btn-info btn-lg"><i class="fas fa-plus"></i></a>
                    </p>
                    <p class="text-muted">
                        <b>- Izin pengajuan cuti</b> <a href="{{ route('user.input5.createcuti') }}" class="btn btn-dark btn-lg"><i class="fas fa-plus"></i></a>
                    </p>
                    <p class="text-muted">
                        <b>- Ketentuan dan peraturan selama jam operasional kerja</b> <a href="" class="btn btn-warning btn-lg"><i class="fas fa-plus"></i></a>
                    </p>
                    
                </div>
              </div>
             
        </div>
    </div>

</div>

@endsection