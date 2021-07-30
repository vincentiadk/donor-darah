<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Donor.id | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="https://donor.darah.id"><b>Donor</b>.id</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrasi Donor.id</p>
                <form action="/registration" method="post">
                    {{ csrf_field() }}
                    @if(session('success'))
                    <div class="text-center">
                        <div class="alert bg-success">{{ session('success') }}</div>
                    </div>
                    @elseif(session('failed'))
                    <div class="text-center">
                        <div class="alert bg-danger">{{ session('failed') }}</div>
                    </div>
                    @endif
                    @if(count($errors) > 0)
                    <div class="alert bg-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama_ktp" placeholder="Nama Sesuai KTP" required value="{{ old('nama_ktp') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span>+ 62</span>
                            </div>
                        </div>
                        <input type="number" class="form-control" name="whatsapp" placeholder="Nomor Whatsapp" required value="{{ old('whatsapp') }}">

                    </div>
                    <div class="form-group clearfix">
                        <label>Golongan Darah</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary @if(old('gol_darah') == '1') active @endif">
                                <input type="radio" name="gol_darah" id="gol_darah" value="1" autocomplete="off" @if(old('gol_darah') == '1') checked @endif>
                                A
                            </label>
                            <label class="btn btn-secondary @if(old('gol_darah') == '2') active @endif">
                                <input type="radio" name="gol_darah" id="gol_darah2" value="2" autocomplete="off" @if(old('gol_darah') == '2') checked @endif>
                                B
                            </label>
                            <label class="btn btn-secondary @if(old('gol_darah') == '3') active @endif">
                                <input type="radio" name="gol_darah" id="gol_darah3" value="3" autocomplete="off" @if(old('gol_darah') == '3') checked @endif>
                                AB
                            </label>
                            <label class="btn btn-secondary  @if(old('gol_darah') == '4') active @endif">
                                <input type="radio" name="gol_darah" id="gol_darah4" value="4" autocomplete="off" @if(old('gol_darah') == '4') checked @endif>
                                O
                            </label>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label>Rhesus</label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary @if(old('rhesus') == '1') active @endif">
                                <input type="radio" name="rhesus" id="rhesus" value="1" autocomplete="off" @if(old('rhesus') == '1') checked @endif>
                                Positif
                            </label>
                            <label class="btn btn-secondary @if(old('rhesus') == '0') active @endif">
                                <input type="radio" name="rhesus" id="rhesus1" value="0" autocomplete="off" @if(old('rhesus') == '0') checked @endif>
                                Negatif
                            </label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation"
                            placeholder="Retype password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    Saya setuju dengan <a href="#">syarat dan ketentuan </a> yang berlaku.
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="/login" class="text-center">Saya sudah terdaftar</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{ asset('template/dist/js/adminlte.min.js') }}"></script>
</body>

</html>