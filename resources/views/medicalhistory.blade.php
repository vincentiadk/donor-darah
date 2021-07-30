<link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<div class="content-wrapper">
    <form action="/admin/medical-history/store" method="post" enctype="multipart/form-data" id="form_data">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row parent">
                    {{ csrf_field() }}
                    <!-- Default box -->
                    <div class="card card-row card-primary card-tabs col-md-12">
                    <div class="card-header">
                            <h3 class="card-title">Riwayat Medis</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 padding">
                                    <h3 class="text-center">DARAH</h3>
                                    <div class="form-group row">
                                        <label class="col-md-4">Golongan Darah</label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->gol_darah) ==
                                                '1') active @endif">
                                                <input type="radio" name="gol_darah" id="gol_darah" value="1"  autocomplete="off"
                                                    @if(strtolower($data['donor']->gol_darah) ==
                                                '1') checked @endif>
                                                A
                                            </label>
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->gol_darah) ==
                                                '2') active @endif">
                                                <input type="radio" name="gol_darah" id="gol_darah2" value="2"  autocomplete="off"
                                                    @if(strtolower($data['donor']->gol_darah) ==
                                                '2') checked @endif>
                                                B
                                            </label>
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->gol_darah) ==
                                                '3') active @endif">
                                                <input type="radio" name="gol_darah" id="gol_darah3" value="3"  autocomplete="off"
                                                    @if(strtolower($data['donor']->gol_darah) ==
                                                '3') checked @endif>
                                                AB
                                            </label>
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->gol_darah) ==
                                                '4') active @endif">
                                                <input type="radio" name="gol_darah" id="gol_darah4" value="4"  autocomplete="off"
                                                    @if(strtolower($data['donor']->gol_darah) ==
                                                '4') checked @endif>
                                                O
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Rhesus</label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->rhesus) ==
                                                '1') active @endif">
                                                <input type="radio" name="rhesus" id="rhesus" value="1"  autocomplete="off"
                                                    @if(strtolower($data['donor']->rhesus) ==
                                                '1') checked @endif>
                                                Positif
                                            </label>
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->rhesus) ==
                                                '0') active @endif">
                                                <input type="radio" name="rhesus" id="rhesus1" value="0"  autocomplete="off"
                                                    @if(strtolower($data['donor']->rhesus) ==
                                                '0') checked @endif>
                                                Negatif
                                            </label>
                                        </div>
                                    </div>
                                    <h3 class="text-center">MEDIS</h3>
                                    <div class="form-group row">
                                        <label class="col-md-4">Terakhir melahirkan / keguguran </label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->melahirkan_gugur) ==
                                                '1') active @endif">
                                                <input type="radio" name="melahirkan_gugur" id="melahirkan_gugur" value="1"  autocomplete="off"
                                                    @if(strtolower($data['donor']->melahirkan_gugur) ==
                                                '1') checked @endif>
                                                Pernah
                                            </label>
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->melahirkan_gugur) ==
                                                '0') active @endif">
                                                <input type="radio" name="melahirkan_gugur" id="melahirkan_gugur1" value="0"  autocomplete="off"
                                                    @if(strtolower($data['donor']->melahirkan_gugur1) ==
                                                '0') checked @endif>
                                                Belum Pernah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Tanggal melahirkan / keguguran</label>
                                        <input name="tanggal_melahirkan_gugur" type="date" id="tanggal_melahirkan_gugur"
                                            class="form-control col-md-8"
                                            value="{{ $data['donor']->tanggal_melahirkan_gugur }}">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Sedang menderita Diabetes </label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->diabetes) ==
                                                '1') active @endif">
                                                <input type="radio" name="diabetes" id="diabetes" value="1" autocomplete="off"
                                                    @if(strtolower($data['donor']->diabetes) ==
                                                '1') checked @endif>
                                                Ya
                                            </label>
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->diabetes) ==
                                                '0') active @endif">
                                                <input type="radio" name="diabetes" id="diabetes1" value="0" autocomplete="off"
                                                    @if(strtolower($data['donor']->diabetes) ==
                                                '0') checked @endif>
                                                Tidak
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Sedang menderita hepatitis </label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->hepatitis) ==
                                                '1') active @endif">
                                                <input type="radio" name="hepatitis" id="hepatitis" value="1"  autocomplete="off"
                                                    @if(strtolower($data['donor']->hepatitis) ==
                                                '1') checked @endif>
                                                Ya
                                            </label>
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->hepatitis) ==
                                                '0') active @endif">
                                                <input type="radio" name="hepatitis" id="hepatitis1" value="0"  autocomplete="off"
                                                    @if(strtolower($data['donor']->hepatitis) ==
                                                '0') checked @endif>
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Sedang menderita AIDS </label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->aids) ==
                                                '1') active @endif">
                                                <input type="radio" name="aids" id="aids" value="1"  autocomplete="off"
                                                    @if(strtolower($data['donor']->aids) ==
                                                '1') checked @endif>
                                                Ya
                                            </label>
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->aids) ==
                                                '0') active @endif">
                                                <input type="radio" name="aids" id="aids1" value="0"  autocomplete="off"
                                                    @if(strtolower($data['donor']->aids) ==
                                                '0') checked @endif>
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Merokok minimal 1 batang per hari </label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->perokok) ==
                                                '1') active @endif">
                                                <input type="radio" name="perokok" id="perokok" value="1"  autocomplete="off"
                                                    @if(strtolower($data['donor']->perokok) ==
                                                '1') checked @endif>
                                                Ya
                                            </label>
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->perokok) ==
                                                '0') active @endif">
                                                <input type="radio" name="perokok" id="perokok1" value="0"  autocomplete="off"
                                                    @if(strtolower($data['donor']->perokok) ==
                                                '0') checked @endif>
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 padding">
                                    <h3 class="text-center">COVID-19</h3>
                                    <div class="form-group row">
                                        <label class="col-md-4">Pernah menderita COVID-19 </label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->covid) ==
                                                '1') active @endif">
                                                <input type="radio" name="covid" id="covid" value="1"  autocomplete="off"
                                                    @if(strtolower($data['donor']->covid) ==
                                                '1') checked @endif>
                                                Ya
                                            </label>
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->covid) ==
                                                '0') active @endif">
                                                <input type="radio" name="covid" id="covid1" value="0"  autocomplete="off"
                                                    @if(strtolower($data['donor']->covid) ==
                                                '0') checked @endif>
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Tanggal dinyatakan negatif COVID-19</label>
                                        <input name="tanggal_sembuh_covid" type="date" id="tanggal_sembuh_covid"
                                            class="form-control col-md-8"
                                            value="{{ $data['donor']->tanggal_sembuh_covid }}">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Vaksin COVID-19 </label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->vaksin) ==
                                                '1') active @endif">
                                                <input type="radio" name="vaksin" id="vaksin" value="1"  autocomplete="off"
                                                    @if(strtolower($data['donor']->vaksin) ==
                                                '1') checked @endif>
                                                Lengkap
                                            </label>
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->vaksin) ==
                                                '0') active @endif">
                                                <input type="radio" name="vaksin" id="vaksin1" value="2"  autocomplete="off"
                                                    @if(strtolower($data['donor']->vaksin) ==
                                                '0') checked @endif>
                                                Belum / Tidak Lengkap
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Jenis Vaksin Terakhir </label>
                                        <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
                                            <label class="btn btn-secondary  @if(strtolower($data['donor']->jenis_vaksin) ==
                                                '1') active @endif">
                                                <input type="radio" name="jenis_vaksin" id="jenis_vaksin" value="1"  autocomplete="off"
                                                    @if(strtolower($data['donor']->jenis_vaksin) ==
                                                '1') checked @endif>
                                                Sinovac
                                            </label>
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->jenis_vaksin) ==
                                                '2') active @endif">
                                                <input type="radio" name="jenis_vaksin" id="jenis_vaksin1" value="2"  autocomplete="off"
                                                    @if(strtolower($data['donor']->jenis_vaksin) ==
                                                '2') checked @endif>
                                                Astrazeneca
                                            </label>
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->jenis_vaksin) ==
                                                '3') active @endif">
                                                <input type="radio" name="jenis_vaksin" id="jenis_vaksin2" value="3"  autocomplete="off"
                                                    @if(strtolower($data['donor']->jenis_vaksin) ==
                                                '3') checked @endif>
                                                Pfitzer
                                            </label>
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->jenis_vaksin) ==
                                                '4') active @endif">
                                                <input type="radio" name="jenis_vaksin" id="jenis_vaksin3" value="4"  autocomplete="off"
                                                    @if(strtolower($data['donor']->jenis_vaksin) ==
                                                '4') checked @endif>
                                                Moderna
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Tanggal terakhir vaksin</label>
                                        <input name="tanggal_vaksin" type="date" id="tanggal_vaksin"
                                            class="form-control col-md-8" value="{{ $data['donor']->tanggal_vaksin }}">
                                    </div>
                                    <button class="btn btn-primary float-right" onclick="simpan()">Simpan</button>
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