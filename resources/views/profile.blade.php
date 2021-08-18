<div id="myContent">
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row parent">
                    <!-- Default box -->
                    <div class="card card-row card-primary card-tabs col-md-12 center">
                        <div class="card-body">
                            <form action="/admin/profile/store" method="post" enctype="multipart/form-data"
                                id="form_data">
                                {{ csrf_field() }}
                                <div class="col-md-12 padding">
                                    <h3 class="text-center">BIODATA</h3>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Nama Sesuai KTP</label>
                                        <input name="nama_ktp" type="text" id="nama_ktp" class="form-control col-md-9"
                                            value="{{ $data['donor']->nama_ktp }}" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Nama Panggilan</label>
                                        <input name="nama_panggilan" type="text" id="nama_panggilan"
                                            class="form-control col-md-9" value="{{ $data['donor']->nama_panggilan }}">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Jenis Kelamin</label>
                                        <div class="btn-group btn-group-toggle col-md-9" data-toggle="buttons">
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->jenis_kelamin) ==
                                                'l') active @endif">
                                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="l"
                                                    autocomplete="off" @if(strtolower($data['donor']->jenis_kelamin) ==
                                                'l') checked @endif>
                                                Laki-laki
                                            </label>
                                            <label class="btn btn-secondary @if(strtolower($data['donor']->jenis_kelamin) ==
                                                'p') active @endif">
                                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="p"
                                                    autocomplete="off" @if(strtolower($data['donor']->jenis_kelamin) ==
                                                'p') checked @endif>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" type="date" id="tanggal_lahir"
                                            class="form-control col-md-9" value="{{ $data['donor']->tanggal_lahir }}">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Nomor KTP</label>
                                        <input name="no_ktp" type="number" id="no_ktp" class="form-control col-md-9"
                                            value="{{ $data['donor']->no_ktp }}" required>
                                    </div>
                                    <h3 class="text-center">KONTAK</h3>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Email</label>
                                        <input name="email" type="email" id="email" class="form-control col-md-9"
                                            value="{{ $data['donor']->user ? $data['donor']->user->email : '' }}"
                                            required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Nomor Telepon</label>
                                        <input type="number" id="no_telp" class="form-control col-md-9"
                                            value="{{ $data['donor']->user? $data['donor']->user->no_telp : '' }}"
                                            name="no_telp" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Whatsapp</label>
                                        <input type="number" id="whatsapp" class="form-control col-md-9" name="whatsapp"
                                            value="{{ $data['donor']->whatsapp }}" required>
                                    </div>
                                    <h3 class="text-center">DOMISILI</h3>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Provinsi</label>
                                        <select name="provinsi_code" class="form-control select2bs4 col-md-9"
                                            id="provinsi_code">
                                            <option value="">-- Pilih Provinsi--</option>
                                            @foreach(App\Models\Provinsi::all() as $provinsi)
                                            <option value="{{ $provinsi->code }}" @if($data['donor']->provinsi_code ==
                                                $provinsi->code) selected @endif>{{ $provinsi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Kab/Kota</label>
                                        <select name="kabupaten_code" class="form-control select2bs4 col-md-9"
                                            id="kabupaten_code">
                                            @if($data['donor']->kabupaten)
                                            <option value="{{ $data['donor']->kabupaten->code }}" selected>
                                                {{$data['donor']->kabupaten->name}}</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Kecamatan</label>
                                        <select name="kecamatan_code" class="form-control select2bs4 col-md-9"
                                            id="kecamatan_code">
                                            @if($data['donor']->kecamatan)
                                            <option value="{{ $data['donor']->kecamatan->code }}" selected>
                                                {{$data['donor']->kecamatan->name}}</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 my-auto">Kelurahan</label>
                                        <select name="kelurahan_code" class="form-control select2bs4 col-md-9"
                                            id="kelurahan_code">
                                            @if($data['donor']->kelurahan)
                                            <option value="{{ $data['donor']->kelurahan->code }}" selected>
                                                {{$data['donor']->kelurahan->name}}</option>
                                            @endif
                                        </select>
                                    </div>

                                    <button class="btn btn-danger mx-auto" url="{{ url('admin/profile/store') }}"
                                        onclick="simpan()" id="btn_simpan">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
    select2AutoSuggest('#kabupaten_code', 'kabupaten', 'provinsi_code');
    select2AutoSuggest('#kecamatan_code', 'kecamatan', 'kabupaten_code');
    select2AutoSuggest('#kelurahan_code', 'kelurahan', 'kecamatan_code');
    </script>
</div>