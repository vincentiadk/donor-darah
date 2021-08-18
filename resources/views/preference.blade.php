<div id="myContent">
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <div class="content-wrapper">
        <form action="/admin/preference/store" method="post" enctype="multipart/form-data" id="form_data">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row parent">
                        <!-- left column -->
                        {{ csrf_field() }}
                        <!-- Default box -->
                        <input type="hidden" id="donor_id" value="{{ $data['donor']->id }}">
                        <div class="card card-row card-primary card-tabs col-md-8">
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
                                    @if($loc->location)
                                    <li>{{ $loc->location->name }} <span class="fas fa-trash float-right"
                                            onclick="delLocation({{ $loc->kabupaten_code }})"></span></li>
                                    <hr />
                                    @endif
                                    @endforeach
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Bersedia donor darah biasa</label>
                                    <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                        <label class="btn btn-secondary @if(strtolower($data['donor']->is_donor_biasa) ==
                                                '1') active @endif">
                                            <input type="radio" name="is_donor_biasa" id="is_donor_biasa"
                                                autocomplete="off" value="1"
                                                @if(strtolower($data['donor']->is_donor_biasa) ==
                                            '1') checked @endif>
                                            Ya
                                        </label>
                                        <label class="btn btn-secondary @if(strtolower($data['donor']->is_donor_biasa) ==
                                                '0') active @endif">
                                            <input type="radio" name="is_donor_biasa" id="is_donor_biasa1" value="0"
                                                autocomplete="off" @if(strtolower($data['donor']->is_donor_biasa) ==
                                            '0') checked @endif>
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Bersedia donor plasma kovalen</label>
                                    <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                        <label class="btn btn-secondary @if(strtolower($data['donor']->is_donor_plasma) ==
                                                '1') active @endif">
                                            <input type="radio" name="is_donor_plasma" id="is_donor_plasma"
                                                autocomplete="off" value="1"
                                                @if(strtolower($data['donor']->is_donor_plasma) ==
                                            '1') checked @endif>
                                            Ya
                                        </label>
                                        <label class="btn btn-secondary @if(strtolower($data['donor']->is_donor_plasma) ==
                                                '0') active @endif">
                                            <input type="radio" name="is_donor_plasma" id="is_donor_plasma1" value="0"
                                                autocomplete="off" @if(strtolower($data['donor']->is_donor_plasma) ==
                                            '0') checked @endif>
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary float-right" url="{{ url('admin/preference/store') }}"
                                    id="btn_simpan" onclick="simpan()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <script>
    select2AutoSuggest('#kabupaten_code', 'kabupaten');
    $('#kabupaten_code').on('change', function() {
        $.ajax({
            url: '{{ url("admin/preference/store") }}',
            type: 'POST',
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                type: 'location',
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
                    $('#location_preference').append('<li>' + val.name +
                        '<span onclick="delLocation(' +
                        val.code + ')" class="fas fa-trash float-right"></span></li><hr/>');
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
                kabupaten_code: code,
                donor_id: $('#donor_id').val()
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                loadingOpen('.content');
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
    </script>
</div>