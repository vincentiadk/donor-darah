<div class="content-wrapper">
    <form action="/admin/reseptor/store" method="post" enctype="multipart/form-data" id="form_data">
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
                    <div class="card card-row card-primary card-tabs col-md-6">
                        <div class="card-header">
                            <h3 class="card-title">Data Reseptor</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Sesuai KTP</label>
                                <input name="nama_ktp" type="text" id="nama_ktp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Panggilan</label>
                                <input name="nama_panggilan" type="text" id="nama_panggilan" class="form-control">
                            </div>
                            <div class="form-group clearfix">
                                <label>Jenis Kelamin </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="l">
                                    <label for="jenis_kelamin">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_kelamin2" name="jenis_kelamin" value="p">
                                    <label for="jenis_kelamin2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="date" id="tanggal_lahir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP</label>
                                <input name="no_ktp" type="number" id="no_ktp" class="form-control">
                            </div>
                            <div class="form-group clearfix">
                                <label>Golongan Darah </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="gol_darah" name="gol_darah" value="1">
                                    <label for="gol_darah">
                                        A
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="gol_darah2" name="gol_darah" value="2">
                                    <label for="gol_darah2">
                                        B
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="gol_darah3" name="gol_darah" value="3">
                                    <label for="gol_darah3">
                                        AB
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="gol_darah4" name="gol_darah" value="4">
                                    <label for="gol_darah4">
                                        O
                                    </label>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label>Rhesus </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="rhesus" name="rhesus" value="1">
                                    <label for="rhesus">
                                        Positif
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="rhesus2" name="rhesus" value="0">
                                    <label for="rhesus2">
                                        Negatif
                                    </label>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label>Jenis Donor </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_donor" name="jenis_donor" value="1">
                                    <label for="jenis_donor">
                                        Biasa
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_donor2" name="jenis_donor" value="2">
                                    <label for="jenis_donor2">
                                        Plasma Kovalen
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Peruntukan</label>
                                <input name="peruntukan" type="text" id="peruntukan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Instansi</label>
                                <input name="instansi" type="text" id="instansi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi_code" class="form-control" id="provinsi_code">
                                    @foreach(App\Models\Provinsi::all() as $provinsi)
                                    <option value="{{ $provinsi->code }}">{{ $provinsi->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kab/Kota</label>
                                <select name="kabupaten_code" class="form-control" id="kabupaten_code">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="kecamatan_code" class="form-control" id="kecamatan_code">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select name="kelurahan_code" class="form-control" id="kelurahan_code">
                                </select>
                            </div>
                            <div class="form-group">
                                <button onclick="simpan()" class="btn btn-primary"> Simpan </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
<script>
select2AutoSuggest('#kabupaten_code', 'kabupaten', 'provinsi_code');
select2AutoSuggest('#kecamatan_code', 'kecamatan', 'kabupaten_code');
select2AutoSuggest('#kelurahan_code', 'kelurahan', 'kecamatan_code');
function simpan() {
    event.preventDefault();
    var formData = new FormData($('#form_data')[0]);
    $.ajax({
        url: '{{ url("admin/reseptor/store") }}',
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
                window.open = '{{ url("admin/reseptor")}}';
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