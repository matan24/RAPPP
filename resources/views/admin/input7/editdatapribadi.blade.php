@extends('layouts.admin')

@section('title', 'Update Data Pribadi Karyawan | April Group')

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
              <br>
              <div id="myModal" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <div class="container text-center">
                            <h5 class="modal-title">Update kelengkapan data</h5>   
                        </div>                                                   
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('update') }}" method="post">
                        @csrf
                        <select id="data_lengkap" name="data_lengkap" class="form-control">
                            <option selected disabled>Pilih</option>
                            <option>
                              Data lengkap
                            </option>
                            <option>
                              Data masih kurang
                            </option>
                        </select>                                   
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mb-4" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                        </div>
                    </form>       
                  </div>
                </div>
              </div>

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
