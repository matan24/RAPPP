@extends('layouts.admin')

@section('title', 'Laporan Karyawan | April Group')

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
                    <h4 class="m-0 font-weight-bold text-primary">Input Informasi Terbaru</h4>
                        <br>
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
                                    <th>Jabatan</th>
                                    <th>Wilayah Kerja</th>
                                    <th>Laporan Harian Kerja</th>
                                    <th>Alamat</th>
                                    <th>WhatsApp/HP</th>
                                    <th>Status Laporan</th>
                                    <th>Keterangan Pekerjaan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->wilayah }}</td>
                                    <td>{!! $item->laporan !!}</td>                
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->hp }}</td>
                                    <td>{{ $item->status_laporan }}</td>
                                    <td>{!! $item->keterangan_laporan !!}</td>
                                    <td class="">
                                       
                                        <button type="button" class="btn btn-info btn-lg mb-2" data-toggle="modal" data-target="#myModal"><i class="bi bi-pencil-square"></i></button>

                                        <div id="myModal" class="modal fade" role="dialog" tabindex="-1">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="container text-center">
                                                        <h5 class="modal-title">Update laporan kerja</h5>   
                                                    </div>                                                   
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <br>
                                                <div class="container">
                                                <form action="{{ route('update_laporan', $item->id) }}" method="post">
                                                    @csrf
                                                    <select id="status_laporan" name="status_laporan" class="form-control">
                                                        <option selected disabled>Status laporan</option>
                                                        <option>
                                                          Diterima
                                                        </option>
                                                        <option>
                                                          Ditolak
                                                        </option>
                                                        <option>
                                                          Diproses
                                                        </option>
                                                        <option>
                                                          Revisi
                                                        </option>
                                                    </select>  
                                                    <br>
                                                    <div class="input-group flex-nowrap">
                                                        <textarea class="form-control" name="keterangan_laporan" id="keterangan_laporan" placeholder="Keterangan laporan"></textarea>
                                                    </div>
        
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary mb-4" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>    
                                              </div>
                                            </div>
                                          </div>
                      
                                        <form action="{{ route('admin.input4.laporankaryawan.delete', $item->id) }}" method="post">
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

@push('ckeditor')
<script>
  ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );

</script>
@endpush

