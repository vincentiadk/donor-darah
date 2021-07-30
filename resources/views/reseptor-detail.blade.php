<input type="hidden" name="donor_id" value="{{ $data['donor']->id}}">
<div class="form-group">
    <label>Nama Sesuai KTP</label>
    <input name="nama_ktp" type="text" id="nama_ktp" class="form-control" value="{{ $data['donor']->nama_ktp }}">
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
            @if(strtolower($data['donor']->jenis_kelamin) == 'l')
        checked @endif>
        <label for="jenis_kelamin">
            Laki-laki
        </label>
    </div>
    <div class="icheck-primary d-inline">
        <input type="radio" id="jenis_kelamin2" name="jenis_kelamin" value="p"
            @if(strtolower($data['donor']->jenis_kelamin) == 'p')
        checked @endif>
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
    <input name="no_ktp" type="number" id="no_ktp" class="form-control" value="{{ $data['donor']->no_ktp }}">
</div>
<div class="form-group row">
    <label class="col-md-4">Golongan Darah</label>
    <div class="btn-group btn-group-toggle col-md-8" data-toggle="buttons">
        <label class="btn btn-secondary @if(strtolower($data['donor']->gol_darah) ==
                                                '1') active @endif">
            <input type="radio" name="gol_darah" id="gol_darah" value="1" autocomplete="off"
                @if(strtolower($data['donor']->gol_darah) ==
            '1') checked @endif>
            A
        </label>
        <label class="btn btn-secondary @if(strtolower($data['donor']->gol_darah) ==
                                                '2') active @endif">
            <input type="radio" name="gol_darah" id="gol_darah2" value="2" autocomplete="off"
                @if(strtolower($data['donor']->gol_darah) ==
            '2') checked @endif>
            B
        </label>
        <label class="btn btn-secondary @if(strtolower($data['donor']->gol_darah) ==
                                                '3') active @endif">
            <input type="radio" name="gol_darah" id="gol_darah3" value="3" autocomplete="off"
                @if(strtolower($data['donor']->gol_darah) ==
            '3') checked @endif>
            AB
        </label>
        <label class="btn btn-secondary @if(strtolower($data['donor']->gol_darah) ==
                                                '4') active @endif">
            <input type="radio" name="gol_darah" id="gol_darah4" value="4" autocomplete="off"
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
            <input type="radio" name="rhesus" id="rhesus" value="1" autocomplete="off"
                @if(strtolower($data['donor']->rhesus) ==
            '1') checked @endif>
            Positif
        </label>
        <label class="btn btn-secondary  @if(strtolower($data['donor']->rhesus) ==
                                                '0') active @endif">
            <input type="radio" name="rhesus" id="rhesus1" value="0" autocomplete="off"
                @if(strtolower($data['donor']->rhesus) ==
            '0') checked @endif>
            Negatif
        </label>
    </div>
</div>
<div class="form-group">
    <label>Peruntukan</label>
    <input name="peruntukan" type="text" id="peruntukan" class="form-control" value="{{ $data['donor']->peruntukan }}">
</div>
<div class="form-group row">
    <label class="col-md-3">Jenis donor </label>
    <div class="btn-group btn-group-toggle col-md-9" data-toggle="buttons">
        <label class="btn btn-secondary  @if(strtolower($data['donor']->jenis_donor) ==
                                                '1') active @endif">
            <input type="radio" name="jenis_donor" id="jenis_donor" value="1" autocomplete="off"
                @if(strtolower($data['donor']->jenis_donor) ==
            '1') checked @endif>
            Biasa
        </label>
        <label class="btn btn-secondary  @if(strtolower($data['donor']->jenis_donor) ==
                                                '2') active @endif">
            <input type="radio" name="jenis_donor" id="jenis_donor1" value="2" autocomplete="off"
                @if(strtolower($data['donor']->jenis_donor) ==
            '2') checked @endif>
            Plasma Kovalen
        </label>
    </div>
</div>
<div class="form-group">
    <label>Instansi</label>
    <input name="instansi" type="text" id="instansi" class="form-control" value="{{ $data['donor']->instansi }}">
</div>
<div class="form-group">
    <label>Provinsi</label>
    <select name="provinsi_code" class="form-control" id="provinsi_code">
        <option value="">-- Pilih Provinsi--</option>
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
<div class="form-group">
    <button onclick="simpan()" class="btn btn-primary"> Simpan </button>
</div>
<script>
select2AutoSuggest('#kabupaten_code', 'kabupaten', 'provinsi_code');
select2AutoSuggest('#kecamatan_code', 'kecamatan', 'kabupaten_code');
select2AutoSuggest('#kelurahan_code', 'kelurahan', 'kecamatan_code');
</script>