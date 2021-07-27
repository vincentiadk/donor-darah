<link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<div class="content-wrapper">
    <form action="/admin/medical-history/store" method="post" enctype="multipart/form-data" id="form_data">
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
                    <div class="card card-row card-primary card-tabs col-md-4">
                        <div class="card-header">
                            <h3 class="card-title">Darah</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group clearfix">
                                <label>Golongan Darah </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="gol_darah" name="gol_darah" value="1"
                                        @if($data['donor']->gol_darah == '1') checked @endif>
                                    <label for="gol_darah">
                                        A
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="gol_darah2" name="gol_darah" value="2"
                                        @if($data['donor']->gol_darah == '2') checked @endif>
                                    <label for="gol_darah2">
                                        B
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="gol_darah3" name="gol_darah" value="3"
                                        @if($data['donor']->gol_darah == '3') checked @endif>
                                    <label for="gol_darah3">
                                        AB
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="gol_darah4" name="gol_darah" value="4"
                                        @if($data['donor']->gol_darah == '4') checked @endif>
                                    <label for="gol_darah4">
                                        O
                                    </label>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label>Rhesus </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="rhesus" name="rhesus" value="1" @if($data['donor']->rhesus
                                    == '1') checked @endif>
                                    <label for="rhesus">
                                        Positif
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="rhesus2" name="rhesus" value="0" @if($data['donor']->rhesus
                                    == '0') checked @endif>
                                    <label for="rhesus2">
                                        Negatif
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-row card-secondary card-tabs col-md-4">
                        <div class="card-header">
                            <h3 class="card-title">Medis</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group clearfix">
                                <label>Terakhir melahirkan / keguguran </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="melahirkan_gugur" name="melahirkan_gugur" value="1"
                                        @if($data['donor']->melahirkan_gugur == '1') checked @endif>
                                    <label for="melahirkan_gugur">
                                        Pernah
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="melahirkan_gugur2" name="melahirkan_gugur" value="0"
                                        @if($data['donor']->melahirkan_gugur == '0') checked @endif>
                                    <label for="melahirkan_gugur2">
                                        Belum Pernah
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Tanggal melahirkan / keguguran</label>
                                <input name="tanggal_melahirkan_gugur" type="date" id="tanggal_melahirkan_gugur"
                                    class="form-control" value="{{ $data['donor']->tanggal_melahirkan_gugur }}">
                            </div>
                            <div class="form-group clearfix">
                                <label>Sedang menderita Diabetes </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="diabetes" name="diabetes" value="1"
                                        @if($data['donor']->diabetes == '1') checked @endif>
                                    <label for="diabetes">
                                        Ya
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="diabetes2" name="diabetes" value="0"
                                        @if($data['donor']->diabetes == '0') checked @endif>
                                    <label for="diabetes2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label>Sedang menderita hepatitis </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="hepatitis" name="hepatitis" value="1"
                                        @if($data['donor']->hepatitis == '1') checked @endif>
                                    <label for="hepatitis">
                                        Ya
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="hepatitis2" name="hepatitis" value="0"
                                        @if($data['donor']->hepatitis == '0') checked @endif>
                                    <label for="hepatitis2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label>Sedang menderita AIDS </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="aids" name="aids" value="1" @if($data['donor']->aids == '1')
                                    checked @endif>
                                    <label for="aids">
                                        Ya
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="aids2" name="aids" value="0" @if($data['donor']->aids ==
                                    '0') checked @endif>
                                    <label for="aids2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label>Merokok minimal 1 batang per hari </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="perokok" name="perokok" value="1"
                                        @if($data['donor']->perokok == '1') checked @endif>
                                    <label for="perokok">
                                        Ya
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="perokok2" name="perokok" value="0"
                                        @if($data['donor']->perokok == '0') checked @endif>
                                    <label for="perokok2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-row card-danger card-tabs col-md-4">
                        <div class="card-header">
                            <h3 class="card-title">Covid - 19</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group clearfix">
                                <label>Pernah menderita COVID-19 </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="covid" name="covid" value="1" @if($data['donor']->covid ==
                                    '1') checked @endif>
                                    <label for="covid">
                                        Ya
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="covid2" name="covid" value="0" @if($data['donor']->covid ==
                                    '0') checked @endif>
                                    <label for="covid2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal dinyatakan negatif COVID-19</label>
                                <input name="tanggal_sembuh_covid" type="date" id="tanggal_sembuh_covid"
                                    class="form-control" value="{{ $data['donor']->tanggal_sembuh_covid }}">
                            </div>
                            <div class="form-group clearfix">
                                <label>Vaksin COVID-19 </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="vaksin" name="vaksin" value="1" @if($data['donor']->vaksin
                                    == '1') checked @endif>
                                    <label for="vaksin">
                                        Lengkap
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="vaksin2" name="vaksin" value="0" @if($data['donor']->vaksin
                                    == '0') checked @endif>
                                    <label for="vaksin2">
                                        Belum / Tidak Lengkap
                                    </label>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label>Jenis Vaksin Terakhir </label>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_vaksin" name="jenis_vaksin" value="1"
                                        @if($data['donor']->jenis_vaksin == '1') checked @endif>
                                    <label for="jenis_vaksin">
                                        Sinovac
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_vaksin2" name="jenis_vaksin" value="2"
                                        @if($data['donor']->jenis_vaksin == '2') checked @endif>
                                    <label for="jenis_vaksin2">
                                        Astra Zeneca
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_vaksin3" name="jenis_vaksin" value="3"
                                        @if($data['donor']->jenis_vaksin == '3') checked @endif>
                                    <label for="jenis_vaksin3">
                                        Pfitzer
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="jenis_vaksin4" name="jenis_vaksin" value="4"
                                        @if($data['donor']->jenis_vaksin == '4') checked @endif>
                                    <label for="jenis_vaksin4">
                                        Moderna
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal terakhir vaksin</label>
                                <input name="tanggal_vaksin" type="date" id="tanggal_vaksin" class="form-control"
                                    value="{{ $data['donor']->tanggal_vaksin }}">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right" onclick="simpan()">Simpan</button>
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
        url: '{{ url("admin/medical-history/store") }}',
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