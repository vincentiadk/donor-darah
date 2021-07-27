<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" onclick="goToPage('admin/profile')">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" onclick="goToPage('admin/medical-history')">Riwayat Medis</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" onclick="goToPage('admin/preference')">Kesediaan Mendonorkan Darah</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" onclick="goToPage('admin/reseptor')">Reseptor</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" onclick="goToPage('admin/need-blood')">Membutuhkan Darah</a>
                </li><li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" onclick="goToPage('admin/donor-history')">Riwayat Donor</a>
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
                        <a href="#" class="dropdown-item dropdown-footer" onclick="goToPage('admin/log')">Lihat Semua Log</a>
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
                        <span class="dropdown-item dropdown-header"> <h3>{{ session('name') }}</h3></span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            Role <span class="float-right text-muted text-sm">{{ App\Models\Role::find(session('role_id'))->name }}</span>
                        </a>
                        
                        <a href="#" class="dropdown-item">
                            Terakhir Login 
                            <span class="float-right text-muted text-sm">{{ session('last_login') }}</span>
                        </a>
                        <a href="#" class="btn btn-secondary" style="width:100%" onclick="goToPage('admin/user/setting')"><i class="fas fa-cog"> </i>  Pengaturan 
                        </a>
                        <a href="/logout" class="btn btn-danger" style="width:100%"> <i class="fas fa-sign-out-alt"> </i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->