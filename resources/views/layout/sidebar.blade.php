  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-danger">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
          <span class="brand-text font-weight-light">Darah ID</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="info" style="color:white">
                  <a href="#" class="d-block">{{ session('name') }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="/" class="nav-link">
                          <i class="nav-icon far fa-address-card"></i>
                          <p>
                              Data Diri
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin/medical-history" class="nav-link">
                          <i class="nav-icon fas fa-notes-medical"></i>
                          <p>
                              Riwayat Medis
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin/preference" class="nav-link">
                          <i class="nav-icon fas fa-hand-holding-medical"></i>
                          <p>
                              Kesediaan Mendonorkan Darah
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin/reseptor" class="nav-link">
                          <i class="nav-icon fas fa-first-aid"></i>
                          <p>
                              Reseptor
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin/need-blood" class="nav-link">
                          <i class="nav-icon fas fa-hospital-user"></i>
                          <p>
                              Membutuhkan Darah
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/admin/donor-history" class="nav-link">
                          <i class="nav-icon fas fa-history"></i>
                          <p>
                              Riwayat Donor Darah
                          </p>
                      </a>
                  </li>
                  <li class="nav-header">PENGATURAN</li>
                  @if(session('role_id') == 1)
                  <li class="nav-item">
                      <a href="/admin/user" class="nav-link">
                          <i class="far fa-user nav-icon"></i>
                          <p>User Management</p>
                      </a>
                  </li>
                  @endif
                 
                  <li class="nav-item">
                      <a href="/admin/log" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Log Aktifitas</p>
                      </a>
                  </li>
                  @if(session('role_id') == 1)
                  <li class="nav-item">
                      <a href="/admin/provinsi" class="nav-link">
                          <i class="far fa-map nav-icon"></i>
                          <p>Provinsi</p>
                      </a>
                  </li>
                  @endif
                  @if(session('role_id') == 1)
                  <li class="nav-item">
                      <a href="/admin/kabupaten" class="nav-link">
                          <i class="far fa-map nav-icon"></i>
                          <p>Kabupaten / Kota</p>
                      </a>
                  </li>
                  @endif
                  @if(session('role_id') == 1)
                  <li class="nav-item">
                      <a href="/admin/kecamatan" class="nav-link">
                          <i class="far fa-map nav-icon"></i>
                          <p>Kecamatan</p>
                      </a>
                  </li>
                  @endif
                  @if(session('role_id') == 1)
                  <li class="nav-item">
                      <a href="/admin/kelurahan" class="nav-link">
                          <i class="far fa-map nav-icon"></i>
                          <p>Kelurahan</p>
                      </a>
                  </li>
                  @endif
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>