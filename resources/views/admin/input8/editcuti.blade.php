@extends('layouts.admin')

@section('title', 'Update Cuti Karyawan | April Group')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow h-100">
            <div class="card-header">
                <h5 class="m-0 pt-1 font-weight-bold float-left">Update Status Izin Karyawan</h5>
                <a href="{{ route('admin.input6.izinsakit') }}" class="btn btn-sm btn-secondary float-right">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.input8.editcuti.update', $cuti->id) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="mb-3 row">
                        <label for="keterangan_cuti" class="col-sm-2 col-form-label">Keterangan cuti</label>
                        <div class="col-sm-10">
                            <select id="keterangan_cuti" name="keterangan_cuti" class="form-control custom-select">
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
                        </div>
                    </div> 
                   
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-info btn-block">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
   

@endsection

{{-- @push('scripts')
<script>
    $('document').ready(function(){
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>
@endpush --}}

