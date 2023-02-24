@extends('layouts.admin')

@section('title', 'Izin Kerja Karyawan | April Group')

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
                                    <th>Surat keterangan sakit</th>
                                    <th>Alamat</th>
                                    <th>WhatsApp/HP</th>
                                    <th>Keterangan sakit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $izin as $item )
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->divisi_kerja }}</td>            
                                    <td><a href="{{ Storage::url($item->surat_sakit) }}" class="btn btn-info btn-lg"><i class="bi bi-file-earmark-arrow-down-fill"></i></a> <b>Download surat sakit</b></td> 
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->hp }}</td>    
                                    <td>{{ $item->keterangan_sakit }}</td>    
                                    <td class="">
                                        
                                        <button type="button" class="btn btn-warning btn-lg mb-2" data-toggle="modal" data-target="#myModal"><i class="bi bi-pencil-square"></i></button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Form Input</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="{{ route('update_sakit', $item->id) }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                    <select id="keterangan_sakit" name="keterangan_sakit" class="form-control">
                                                        <option selected disabled>Pilih</option>
                                                        <option>
                                                          Diterima
                                                        </option>
                                                        <option>
                                                          Ditolak
                                                        </option>
                                                        <option>
                                                          Diproses
                                                        </option>
                                                    </select>    
                                                    <small id="namaHelp" class="form-text text-muted">Pilih keterangan</small>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <form action="">
                                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#exampleModal" data-id="{{ $item->id }}" data-whatever="@mdo"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                Apakah yakin menghapus data ini ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                     {!! Form::open(['route' => ['izinsakit.destroy', 3], 'method' => 'delete']) !!}
                                                     {!! Form::hidden('id',null,['id'=>'id-destroy']) !!}
                                                    <button type="submit" class="btn btn-danger">Ya</button>
                                                     {!! Form::close() !!}
                                                </div>
                                            </div>
                                            </div>
                                        </div>


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
   
   <script>
             $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            $('#id-destroy').val(id);
        });

    </script>
    

@endpush
