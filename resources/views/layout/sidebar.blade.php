<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li> --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Master </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('master/agama/index') }}" class="sidebar-link"><i
                                    class="mdi mdi-bell-ring-outline"></i><span class="hide-menu">Agama</span></a></li>
                        {{-- <li class="sidebar-item"><a href="{{ url('master/role/index') }}" class="sidebar-link"><i
                                    class="mdi mdi-account-convert"></i><span class="hide-menu">Biodata</span></a></li> --}}
                        <li class="sidebar-item"><a href="{{ url('master/role/index') }}" class="sidebar-link"><i
                                    class="mdi mdi-account-settings"></i><span class="hide-menu">Hak Akses</span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ url('master/kategori/index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Kategori</span></a></li>
                        <li class="sidebar-item"><a href="{{ url('master/kategoripelanggaran/index') }}"
                                class="sidebar-link"><i class="mdi mdi-alert-box"></i><span class="hide-menu">Kategori
                                    Pelanggaran</span></a></li>
                        <li class="sidebar-item"><a href="{{ url('master/pelanggaran/index') }}" class="sidebar-link"><i
                                    class="mdi mdi-account-key"></i><span class="hide-menu">Pelanggaran</span></a></li>
                        <li class="sidebar-item"><a href="{{ url('master/pengguna/index') }}" class="sidebar-link"><i
                                    class="mdi mdi-account"></i><span class="hide-menu">Pengguna</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span
                            class="hide-menu">Transaksi </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('transaksi/lp/index') }}" class="sidebar-link"><i
                                    class="mdi mdi-bell-ring-outline"></i><span class="hide-menu">Laporan Polisi</span></a></li>
                        {{-- <li class="sidebar-item"><a href="{{ url('transaksi/bap/index') }}" class="sidebar-link"><i
                                    class="mdi mdi-bell-ring-outline"></i><span class="hide-menu">BAP</span></a></li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
