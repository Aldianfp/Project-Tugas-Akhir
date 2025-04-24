<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <div class="d-flex sidebar-profile">
                <div class="sidebar-profile-image">
                    <img src="{{ auth()->user()->avatar() }}" alt="image">
                    <span class="sidebar-status-indicator"></span>
                </div>
                <div class="sidebar-profile-name">
                    <p class="sidebar-name">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="sidebar-designation">
                        Active
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="typcn typcn-th-small menu-icon"></i>
                <span class="menu-title">Dashboard </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.company.index') }}">
                <i class="typcn typcn-home menu-icon"></i>
                <span class="menu-title">Tentang Perusahaan </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.portofolio.index') }}">
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">Portofolio </span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#profilperusahaan" aria-expanded="false"
                aria-controls="profilperusahaan">
                <i class="typcn typcn-database menu-icon"></i>
                <span class="menu-title">Profil Perusahaan</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="profilperusahaan">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.personil.index') }}">Personil Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.merk.index') }}">Merk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.type.index') }}">Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.peralatan.index') }}">Peralatan</a>
                    </li>

                </ul>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kontak.index') }}">
                <i class=" typcn typcn-contacts menu-icon"></i>
                <span class="menu-title">Kontak</span>
            </a>

        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#laporankeuangan" aria-expanded="false"
                aria-controls="laporankeuangan">
                <i class="typcn typcn-database menu-icon"></i>
                <span class="menu-title">Manajemen Akuntansi</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="laporankeuangan">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pemasukan.index') }}">Pemasukan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pengeluaran.index') }}">Pengeluaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.laporan-keuangan.index') }}">Laporan Keuangan</a>
                    </li>
                </ul>
            </div>
        </li>

        @if (Auth::user()->role == 'admin')
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class=" typcn typcn-user-add menu-icon"></i>
                    <span class="menu-title"> User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.helpdesk.adminindex') }}">
                    <i class=" typcn typcn-user-add menu-icon"></i>
                    <span class="menu-title"> Helpdesk</span>
                </a>
            </li>
        @endif


    </ul>
</nav>
