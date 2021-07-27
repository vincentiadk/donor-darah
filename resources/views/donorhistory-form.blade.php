<div class="content-wrapper">
    <form action="/admin/donor-history/store" method="post" enctype="multipart/form-data" id="form_data">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row parent">
                    <div class="col-md-12">
                        <div class="alert alert-danger" id="validasi_element" style="display:none;">
                            <ul id="validasi_content"></ul>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <!-- Default box -->
                    <input name="donor_id" type="hidden" value="{{ session('id') }}">
                    <input name="id" type="hidden" value="{{ $data['donorhistory']->id }}">
                    <div class="card card-row card-primary card-tabs col-md-8">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Riwayat Donor Darah</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-3 text-left">Tanggal Donor</label>
                                <div class="col-lg-9">
                                    <input name="tanggal_donor" type="date" id="tanggal-donor" class="form-control" value="{{ $data['donorhistory']->tanggal_donor }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 text-left">Intansi/RS tempat mendonorkan darah</label>
                                <div class="col-lg-9">
                                    <input name="instansi" type="text" id="instansi" class="form-control" value="{{ $data['donorhistory']->instansi }}">
                                </div>
                            </div>
                            <div class="form-group clearfix row">
                                <label class="col-lg-3 text-left">Jenis donor </label>
                                <div class="col-lg-9">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="jenis_donor" name="jenis_donor" value="1" @if($data['donorhistory']->jenis_donor == 1) checked @endif>
                                        <label for="jenis_donor">
                                            Biasa
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="jenis_donor2" name="jenis_donor" value="2" @if($data['donorhistory']->jenis_donor == 2) checked @endif>
                                        <label for="jenis_donor2">
                                            Plasma Kovalen
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button onclick="simpan()" class="btn btn-primary"> Simpan </button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </form>
</div>
<script>
function simpan() {
    event.preventDefault();
    var formData = new FormData($('#form_data')[0]);
    $.ajax({
        url: '{{ url("admin/donor-history/store") }}',
        type: 'POST',
        dataType: 'JSON',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            loadingOpen('.content');
            $('#validasi_element').hide();
            $('#validasi_content').html('');
        },
        success: function(response) {
            loadingClose('.content');
            if (response.status == 200) {
                Toast.fire({
                    icon: 'success',
                    title: response.message
                });
                goToPage('admin/donor-history');
            } else if (response.status == 422) {
                $('#validasi_element').show();
                Toast.fire({
                    icon: 'info',
                    title: 'Validasi'
                });

                $.each(response.error, function(i, val) {
                    $('#validasi_content').append('<li>' + val + '</li>');
                })
            } else {
                Toast.fire({
                    icon: 'warning',
                    title: response.message
                });
            }
        },
        error: function() {
            loadingClose('.content');
            Toast.fire({
                icon: 'error',
                title: 'Server Error!'
            });
        }

    });
}
</script>