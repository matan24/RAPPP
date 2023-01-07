@extends('layouts.admin')

@section('title', 'Informasi Karyawan | April Group')

@section('container')

       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-4">
                <h4 class="m-0 font-weight-bold text-primary">Input Informasi Terbaru</h4>

                <br>
                <a href="{{ route('admin.input2.detailinformasi') }}" class="btn btn-info">Lihat Informasi</a>

                <form action="{{ route('admin.input2.createinformasi.store') }}" method="post">
                    @csrf
                    <br>
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
  
                    <div class="mb-3 row">
                      <label for="judul" class="col-sm-2 col-form-label">Informasi</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="judul" id="judul">
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                      <label for="keterangan_pekerjaan" class="col-sm-2 col-form-label">Keterangan pekerjaan</label>
                      <div class="col-sm-8">
                        <textarea name="keterangan_pekerjaan" id="editor" cols="30" rows="10"></textarea>
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                      <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                        <label for="status_pekerjaan" class="col-sm-2 col-form-label">Status pekerjaan</label>
                        <div class="col-sm-8">
                            <select id="status_pekerjaan" name="status_pekerjaan" class="form-control custom-select">
                                <option selected disabled>Pilih</option>
                                <option>
                                  Selesaikan dalam hari ini
                                </option>
                                <option>
                                  Selesaikan dalam minggu ini
                                </option>
                                <option>
                                  Selesaikan minggu depan
                                </option>  
                            </select>
                        </div>
                    </div> 
        
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>    
                </form>
                <br>
            </div>
        </div>

    </div>

@endsection
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