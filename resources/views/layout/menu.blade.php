<div id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
          <div class="admin-profile" id="sl_ap">
            <div class="admin-picture">
              <img src="images/logo stikom.png" alt="">
            </div>
            <p class="admin-name">
              ITB STIKOM Bali
            </p>
            <p class="admin-level">
              Admin Utama
            </p>
          </div>
        </div>

        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action active">
            <div class="d-flex w-100 align-content-center">
              <span class="material-icons-sharp">grid_view</span>
              <h5 class="mb-1 mr-5">Dashboard</h5>
            </div>
          </a>
          <a href="{{route('karyawan.index')}}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 align-content-center">
              <span class="material-icons-sharp">text_snippet</span>
              <h5 class="mb-1">Data Karyawan</h5>
            </div>
          </a>

          <div class="dropdown">
            <a href="#" class="dropdown-btn list-group-item list-group-item-action">
              <div class="d-flex w-100 d-flex justify-content-between align-items-center">
                <h5>Lihat Data HRD</h5>
                <span class="material-icons-sharp">expand_circle_down</span>
              </div>
            </a>
            <div class="dropdown-container">
              <a href="{{route('dapartement.index')}}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Data Departmen</h5>
                </div>
              </a>
              <a href="{{route('KaryawanJabatan.index')}}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Data Jabatan</h5>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Data Jam Kerja</h5>
                </div>
              </a>
              <a href="{{url('master_cuti')}}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Data Cuti</h5>
                </div>
              </a>

              <a href="{{route('cuti.index')}}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Transaksi Cuti</h5>
                </div>
              </a>


              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Periode Gaji</h5>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Daftar Gaji</h5>
                </div>
              </a>
              <a href="{{ route('pengumuman.index') }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Pengumuman</h5>
                </div>
              </a>
            </div>
          </div>

          <div class="dropdown">
            <a href="#" class="dropdown-btn list-group-item list-group-item-action">
              <div class="d-flex w-100 d-flex justify-content-between align-items-center">
                <h5>Data Kehadiran</h5>
                <span class="material-icons-sharp">expand_circle_down</span>
              </div>
            </a>
            <div class="dropdown-container">
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">photo_camera</span>
                  <h5 class="mb-1">Data Absensi</h5>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Data Lembur</h5>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-content-center">
                  <span class="material-icons-sharp">text_snippet</span>
                  <h5 class="mb-1">Data Izin</h5>
                </div>
              </a>
            </div>
          </div>

          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 align-content-center">
              <span class="material-icons-sharp">text_snippet</span>
              <h5 class="mb-1">KPI (Indikator)</h5>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 align-content-center">
              <span class="material-icons-sharp">text_snippet</span>
              <h5 class="mb-1">KPA (Penilaian)</h5>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 align-content-center">
              <span class="material-icons-sharp">text_snippet</span>
              <h5 class="mb-1">Set Kompetensi</h5>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 align-content-center">
              <span class="material-icons-sharp">settings</span>
              <h5 class="mb-1">Profile</h5>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 align-content-center">
              <span class="material-icons-sharp">logout</span>
              <h5 class="mb-1">Logout</h5>
            </div>
          </a>
        </div>
</div>
