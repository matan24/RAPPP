@extends('layouts.admin')

@section('title', 'Tambah Karyawan | April Group')

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
                <h4 class="m-0 font-weight-bold text-primary">Tambah Karyawan</h4>
                <br>
                @if (session('status'))
                <div class="alert alert-info">
                  {{ session('status')}}
                </div>
                 @endif
                <br>
                <form action="{{ route('admin.input1.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                     <div class="form-group">
                       <input name="users" type="file">                 
                     </div>
                     <div class="form-group"><button class="btn btn-primary">Import</button></div>
                </form>
                    <br>
                    <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
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
                            </tr>
                            @endforeach   
                        </tbody>                                
                    </table>
                <br>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @endsection

    @push('tablescript') 
    <!-- Page level plugins -->
    <script src="{{ asset('admin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin2/js/demo/datatables-demo.js') }}"></script>
    <script>  
     $(function () {
       $("#example1").DataTable({
         "responsive": true, "lengthChange": false, "autoWidth": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
       }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
       $('#example2').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": true,
         "ordering": true,
         "info": true,
         "autoWidth": false,
         "responsive": true,
       });
     });
     </script>
   @endpush
  
      

