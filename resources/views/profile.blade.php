<link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<div class="content-wrapper">
    <form action="/admin/profile/store" method="post" enctype="multipart/form-data" id="form_data">
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
                    <div class="card card-row card-primary card-tabs col-md-8 center">
                        <div class="card-header">
                            <h3 class="card-title">Data Diri</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Sesuai KTP</label>
                                <input name="nama_ktp" type="text" id="nama_ktp" class="form-control"
                                    value="{{ $data['donor']->nama_ktp }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Panggilan</label>
                                <input name="nama_panggilan" type="text" id="nama_panggilan" class="form-control"
                                    value="{{ $data['donor']->nama_panggilan }}">
                            </div>
                            <div class="form-group clearfix">
                                <label>Jenis Kelamin </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="l"
                                        @if(strtolower($data['donor']->jenis_kelamin) == 'l') checked @endif>
                                    <label for="jenis_kelamin">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_kelamin2" name="jenis_kelamin" value="p"
                                        @if(strtolower($data['donor']->jenis_kelamin) == 'p') checked @endif>
                                    <label for="jenis_kelamin2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="date" id="tanggal_lahir" class="form-control"
                                    value="{{ $data['donor']->tanggal_lahir }}">
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP</label>
                                <input name="no_ktp" type="number" id="no_ktp" class="form-control"
                                    value="{{ $data['donor']->no_ktp }}">
                            </div>
                        </div>
                    </div>
                    <div class="card card-row card-warning card-tabs col-md-8 center ">
                        <div class="card-header">
                            <h3 class="card-title">Kontak</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" id="email" class="form-control"
                                    value="{{ $data['donor']->user ? $data['donor']->user->email : '' }}">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" id="no_telp" class="form-control"
                                    value="{{ $data['donor']->user? $data['donor']->user->no_telp : '' }}"
                                    name="no_telp">
                            </div>
                            <div class="form-group">
                                <label>Whatsapp</label>
                                <input type="number" id="whatsapp" class="form-control" name="whatsapp"
                                    value="{{ $data['donor']->whatsapp }}">
                            </div>

                        </div>
                    </div>
                    <div class="card card-row card-secondary card-tabs col-md-8 center">
                        <div class="card-header">
                            <h3 class="card-title">Domisili</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi_code" class="form-control" id="provinsi_code">
                                    @foreach(App\Models\Provinsi::all() as $provinsi)
                                    <option value="{{ $provinsi->code }}" @if($data['donor']->provinsi_code ==
                                        $provinsi->code) selected @endif>{{ $provinsi->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kab/Kota</label>
                                <select name="kabupaten_code" class="form-control" id="kabupaten_code">
                                    @if($data['donor']->kabupaten)
                                    <option value="{{ $data['donor']->kabupaten->code }}" selected>
                                        {{$data['donor']->kabupaten->name}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="kecamatan_code" class="form-control" id="kecamatan_code">
                                    @if($data['donor']->kecamatan)
                                    <option value="{{ $data['donor']->kecamatan->code }}" selected>
                                        {{$data['donor']->kecamatan->name}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select name="kelurahan_code" class="form-control" id="kelurahan_code">
                                    @if($data['donor']->kelurahan)
                                    <option value="{{ $data['donor']->kelurahan->code }}" selected>
                                        {{$data['donor']->kelurahan->name}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <button class="btn btn-primary float-right" onclick="simpan()">Simpan</button>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
<script>
select2AutoSuggest('#kabupaten_code', 'kabupaten', 'provinsi_code');
select2AutoSuggest('#kecamatan_code', 'kecamatan', 'kabupaten_code');
select2AutoSuggest('#kelurahan_code', 'kelurahan', 'kecamatan_code');

function simpan() {
    event.preventDefault();
    var formData = new FormData($('#form_data')[0]);
    $.ajax({
        url: '{{ url("admin/profile/store") }}',
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