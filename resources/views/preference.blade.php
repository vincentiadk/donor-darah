<link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<div class="content-wrapper">
    <form action="/admin/preference/store" method="post" enctype="multipart/form-data" id="form_data">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" id="validasi_element" style="display:none;">
                            <ul id="validasi_content"></ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- left column -->
                    {{ csrf_field() }}
                    <!-- Default box -->
                    <input type="hidden" id="donor_id" value="{{ $data['donor']->id }}">
                    <div class="card card-row card-primary card-tabs col-md-5">
                        <div class="card-header">
                            <h3 class="card-title">Kesediaan Mendonorkan Darah</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                    <label>Pilih Kota/Kabupaten Anda bersedia untuk mendonorkan darah :</label>
                                    <select name="kabupaten_code" id="kabupaten_code" class="form-control"></select>
                            </div>
                            <div class="form-group" id="location_preference">
                                @foreach($data['location_preferens'] as $loc)
                                <li>{{ $loc->location->name }} <span class="fas fa-trash float-right" onclick="delLocation({{ $loc->kabupaten_code }})"></span></li>
                                <hr/>
                                @endforeach
                            </div>
                            <div class="form-group clearfix">
                                <label>Bersedia donor darah biasa</label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="is_donor_biasa" name="is_donor_biasa" value="1" @if($data['donor']->is_donor_biasa == '1') checked @endif>
                                    <label for="is_donor_biasa">
                                        Ya
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="is_donor_biasa2" name="is_donor_biasa" value="0" @if($data['donor']->is_donor_biasa == '0') checked @endif>
                                    <label for="is_donor_biasa2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label>Bersedia donor plasma kovalen</label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="is_donor_plasma" name="is_donor_plasma" value="1" @if($data['donor']->is_donor_plasma == '1') checked @endif>
                                    <label for="is_donor_plasma">
                                        Ya
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="is_donor_plasma2" name="is_donor_plasma" value="0" @if($data['donor']->is_donor_plasma == '0') checked @endif>
                                    <label for="is_donor_plasma2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-secondary" onclick="cancel()">Abaikan</button>
                            <button class="btn btn-primary float-right" onclick="simpan()">Simpan</button>
                        </div>
                    </div>                   
                </div>       
            </div>
        </section>
    </form>
</div>
<script>
select2AutoSuggest('#kabupaten_code', 'kabupaten');
$('#kabupaten_code').on('change', function(){
    $.ajax({
        url: '{{ url("admin/preference/store") }}',
        type: 'POST',
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            type : 'location',
            kabupaten_code: $('#kabupaten_code').val(),
        },
        success: function(response) {
            getLocation();
        }
    });
});
function getLocation() {
    $.ajax({
        url: '{{ url("admin/select2/location-preference") }}',
        type: 'POST',
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            donor_id: $('#donor_id').val()
        },
        success: function(response) {
            $('#location_preference').html('');
            $.each(response, function(i, val) {
                $('#location_preference').append('<li>' + val.name +'<span onclick="delLocation('+val.code+')" class="fas fa-trash float-right"></span></li><hr/>');
            })
            $('#kabupaten_code').val('');
        }
    });
}
function delLocation(code) {
    $.ajax({
        url: '{{ url("admin/preference/delete-location") }}',
        type: 'POST',
        dataType: 'JSON',
        data: {
            kabupaten_code : code,
            donor_id : $('#donor_id').val()
        },
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
            getLocation();
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
function simpan() {
    event.preventDefault();
    var formData = new FormData($('#form_data')[0]);
    $.ajax({
        url: '{{ url("admin/preference/store") }}',
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