<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link page" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link page" href="{{url('admin/profile')}}">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link page" href="{{url('admin/medical-history')}}">Data Medis</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link page" href="{{url('admin/preference')}}">Kesediaan Donor</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link page" href="{{url('admin/reseptor')}}">Reseptor</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link page" href="{{url('admin/need-blood')}}">Membutuhkan Darah</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link page" href="{{url('admin/donor-history')}}">Riwayat Donor</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">10 Log Terakhir</span>
                        <div class="dropdown-divider"></div>
                        @foreach($data['logs'] as $log)
                        <a href="#" class="dropdown-item">
                            {{ $log->activity }} @if($log->logable_type != "") : {{ $log->logable_type }} @endif
                            <span class="float-right text-muted text-sm">{{ $log->created_at }}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        @endforeach
                        <a class="dropdown-item dropdown-footer page" href="{{ url('admin/log') }}">Lihat Semua
                            Log</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
                            <h3>{{ session('name') }}</h3>
                        </span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            Role <span
                                class="float-right text-muted text-sm">{{ App\Models\Role::find(session('role_id'))->name }}</span>
                        </a>

                        <a href="#" class="dropdown-item">
                            Terakhir Login
                            <span class="float-right text-muted text-sm">{{ session('last_login') }}</span>
                        </a>
                        <a class="btn btn-secondary page" style="width:100%"
                            href="{{ url('admin/user/setting') }}"><i class="fas fa-cog"> </i> Pengaturan
                        </a>
                        <a href="/logout" class="btn btn-danger" style="width:100%"> <i class="fas fa-sign-out-alt">
                            </i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <div class="modal animated bounceInRight text-left " id="modal_validation" data-backdrop="static" role="dialog"
            aria-labelledby="myModalLabel50" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel50">Error!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul id="validasi_content"></ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
