@extends('layouts.user')

@section('title', 'Update Data Pribadi | April Group')

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
                <h4 class="m-0 font-weight-bold text-primary">Jangan lupa untuk selalu memperbarui data pribadi anda</h4>
                <br>
                <form action="{{ route('user.input2.editdata.update', $pribadi->id ) }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <br>
                    @if (session('status'))
                        <div class="alert alert-primary">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <div class="mb-3 row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama lengkap</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" id="nama"
                         value="{{ $pribadi->nama }}">
                      </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat lahir</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="tempat" id="tempat"
                           value="{{ $pribadi->tempat }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal lahir</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control" name="tanggal" id="tanggal"
                           value="{{ $pribadi->tanggal }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <select id="gender" name="gender" class="form-control custom-select">
                                <option selected disabled>Pilih</option>
                                <option {{ $pribadi->gender == 'Pria' ? 'selected' : '' }} value="Pria">
                                  Pria
                                </option>
                                <option {{ $pribadi->gender == 'Wanita' ? 'selected' : '' }} value="Wanita">
                                  Wanita
                                </option>
                            </select>
                        </div>
                    </div> 

                    <div class="mb-3 row">
                        <label for="status_pribadi" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select id="status_pribadi" name="status_pribadi" class="form-control custom-select">
                                <option selected disabled>Pilih</option>
                                <option {{ $pribadi->status_pribadi == 'Belum menikah' ? 'selected' : '' }} value="Belum menikah">
                                  Belum menikah
                                </option>
                                <option {{ $pribadi->status_pribadi == 'Sudah menikah' ? 'selected' : '' }} value="Sudah menikah">
                                  Sudah menikah
                                </option>
                            </select>
                        </div>
                    </div>
  
                    <div class="mb-3 row">
                      <label for="image" class="col-sm-2 col-form-label">Kartu tanda penduduk ~ KTP
                        <b><i>ktp wajib di scanner</i></b>
                      </label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control" name="image" id="image">
                      </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="jabatan" id="jabatan"
                           value="{{ $pribadi->jabatan }}">
                        </div>
                      </div>

                    <div class="mb-3 row">
                      <label for="wilayah" class="col-sm-2 col-form-label">Wilayah kerja</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="wilayah" id="wilayah"
                         value="{{ $pribadi->wilayah }}">
                      </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="alamat" id="alamat"
                           value="{{ $pribadi->alamat }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="hp" class="col-sm-2 col-form-label">WhatsApp/HP</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="hp" id="hp"
                           value="{{ $pribadi->hp }}">
                        </div>
                    </div>
        
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">Update</button>
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
