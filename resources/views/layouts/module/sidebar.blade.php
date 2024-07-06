<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">

        <span class="brand-text font-weight-light">GKI SULSEL</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-close">
                    <a href="#" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Home
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.hero.index') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hero</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.subhero.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Hero</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.jemaat.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                          Jemaat
                      </p>
                  </a>
              </li>




                <li class="nav-item">
                    <a href="{{ route('admin.gembala.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Gembala
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('admin.pengurus.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Pengurus
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.warta.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Warta
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.berita.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                          Berita
                      </p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        User
                    </p>
                </a>
            </li>


                <li class="nav-item menu-close">
                    <a href="#" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Formulir
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.atestasi.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Atestasi Keluar/Pindah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.atestasi_masuk.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Atestasi Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.keanggotaan.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Keterangan Kaanggotaan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Baptis
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route("admin.baptisAnak.index")}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Baptis Anak</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.baptisDewasa.index')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Baptis Dewasa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.sidi.index')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Sidi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Pernikahan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.peneguhan_nikah.index')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Peneguhan Pernikahan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route("admin.izin_nikah.index")}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Ijin Nikah</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.nilai_agama.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nilai Agama</p>
                            </a>
                        </li>



                    </ul>
                </li>

            </ul>
        </nav>

    </div>

</aside>
