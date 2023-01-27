@extends('layouts.admin')

@section('title', 'Home Admin | April Group')

@section('container')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-4">
            <p class="alert alert-primary" style="width: 36rem;" >
                <b>Data karyawan</b> <a href="{{ route('admin.input7.datapribadikaryawan') }}" class="btn btn-success btn-lg"><i class="bi bi-eye-fill"></i></a>
            </p>
            <hr class="border border-primary">
            <div class="jumbotron jumbotron-fluid alert alert-primary">
                <div class="">
                    <p class="text-muted">
                        <b>- Informasi terbaru</b> <a href="" class="btn btn-danger btn-lg"><i class="bi bi-eye-fill"></i></a>
                    </p>
                    <p class="text-muted">
                        <b>- Data pengajuan pindah divisi kerja karyawan</b> <a href="" class="btn btn-primary btn-lg"><i class="bi bi-eye-fill"></i></a>
                    </p>
                    <p class="text-muted">
                        <b>- Data izin tidak bekerja karyawan</b> <a href="" class="btn btn-dark btn-lg"><i class="bi bi-eye-fill"></i></a>
                    </p>
                    <p class="text-muted">
                        <b>- Data pengajuan cuti karyawan</b> <a href="{{ route('admin.input8.datacuti') }}" class="btn btn-warning btn-lg"><i class="bi bi-eye-fill"></i></a>
                    </p>
                    <p class="text-muted">
                        <b>- Ketentuan dan peraturan selama jam operasional kerja</b> <a href="" class="btn btn-info btn-lg"><i class="bi bi-eye-fill"></i></a>
                    </p>
                    
                </div>
              </div>
             
        </div>
    </div>

</div>

@endsection