<div class="content-wrapper">
    <form action="/admin/reseptor/store" method="post" enctype="multipart/form-data" id="form_data">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row parent">
                    {{ csrf_field() }}
                    <!-- Default box -->
                    <div class="card card-row card-primary card-tabs col-md-10">
                        <div class="card-header">
                            <h3 class="card-title">Reseptor</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <h3 class="text-center"> DATA RESEPTOR </h3>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Nama Sesuai KTP</label>
                                        <div class="col-md-8">
                                            <input name="nama_ktp" type="text" id="nama_ktp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Nama Panggilan</label>
                                        <div class="col-md-8">
                                            <input name="nama_panggilan" type="text" id="nama_panggilan"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Jenis Kelamin</label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary">
                                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="l"
                                                    autocomplete="off">
                                                Laki-laki
                                            </label>
                                            <label class="btn btn-secondary ">
                                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="p"
                                                    autocomplete="off">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Tanggal Lahir</label>
                                        <div class="col-md-8">
                                            <input name="tanggal_lahir" type="date" id="tanggal_lahir"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Nomor KTP</label>
                                        <div class="col-md-8">
                                            <input name="no_ktp" type="number" id="no_ktp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="text-center">KEBUTUHAN DARAH</h3>
                                    <div class="form-group row">
                                        <label class="col-md-4">Golongan Darah</label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary">
                                                <input type="radio" name="gol_darah" id="gol_darah" value="1"
                                                    autocomplete="off">
                                                A
                                            </label>
                                            <label class="btn btn-secondary ">
                                                <input type="radio" name="gol_darah" id="gol_darah2" value="2"
                                                    autocomplete="off">
                                                B
                                            </label>
                                            <label class="btn btn-secondary">
                                                <input type="radio" name="gol_darah" id="gol_darah3" value="3"
                                                    autocomplete="off">
                                                AB
                                            </label>
                                            <label class="btn btn-secondary">
                                                <input type="radio" name="gol_darah" id="gol_darah4" value="4"
                                                    autocomplete="off">
                                                O
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Rhesus</label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary ">
                                                <input type="radio" name="rhesus" id="rhesus" value="1"
                                                    autocomplete="off">
                                                Positif
                                            </label>
                                            <label class="btn btn-secondary  ">
                                                <input type="radio" name="rhesus" id="rhesus1" value="0"
                                                    autocomplete="off">
                                                Negatif
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Jenis Donor</label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary">
                                                <input type="radio" name="jenis_donor" id="jenis_donor" value="1"
                                                    autocomplete="off">
                                                Biasa
                                            </label>
                                            <label class="btn btn-secondary ">
                                                <input type="radio" name="jenis_donor" id="jenis_donor2" value="2"
                                                    autocomplete="off">
                                                Plasma Kovalen
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Peruntukan darah</label>
                                        <div class="col-md-8">
                                            <input name="peruntukan" type="text" id="peruntukan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Instansi/RS tempat dirawat</label>
                                        <div class="col-md-8">
                                            <input name="instansi" type="text" id="instansi" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Provinsi</label>
                                        <div class="col-md-8">
                                            <select name="provinsi_code" class="form-control select2"
                                                id="provinsi_code">
                                                @foreach(App\Models\Provinsi::all() as $provinsi)
                                                <option value="{{ $provinsi->code }}">{{ $provinsi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Kab/Kota</label>
                                        <div class="col-md-8">
                                            <select name="kabupaten_code" class="form-control select2"
                                                id="kabupaten_code">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Kecamatan</label>
                                        <div class="col-md-8">
                                            <select name="kecamatan_code" class="form-control select2"
                                                id="kecamatan_code">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 ">Kelurahan</label>
                                        <div class="col-md-8">
                                            <select name="kelurahan_code" class="form-control select2"
                                                id="kelurahan_code">
                                            </select>
                                        </div>
                                    </div>
                                    <button onclick="simpan()" class="btn btn-primary"> Simpan </button>
                                </div>
                            </div>
                        </div>
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
            $('#validasi_content').html('');
        },
        success: function(response) {
            loadingClose('.content');
            if (response.status == 200) {
                Toast.fire({
                    icon: 'success',
                    title: response.message
                });
                goToPage('admin/reseptor');
            } else if (response.status == 422) {
                $.each(response.error, function(i, val) {
                    $('#validasi_content').append('<li>' + val + '</li>');
                })
                $('#modal_validation').modal('show');
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