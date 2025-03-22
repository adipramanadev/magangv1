<div class="navigation">
    <h5 class="title">Menu Navigasi</h5>
    <!-- /.title -->
    <ul class="menu js__accordion">
        <li>
            <a class="waves-effect" href="index.html"><i class="menu-icon fa fa-home"></i><span>Dashboard</span></a>
        </li>
        <li>
            <a class="waves-effect parent-item js__control" href="#"><i
                    class="menu-icon fa fa-flag"></i><span>Manajemen Master</span><span
                    class="menu-arrow fa fa-angle-down"></span></a>
            <ul class="sub-menu js__content">
                <li><a href="{{ route('jurusan.index') }}">Manajemen Jurusan</a></li>
                <li><a href="{{ route('dudi.index') }}">Manajemen Dudi</a></li>
                <li><a href="{{ route('guru.index') }}">Manajemen Guru</a></li>
                <li><a href="{{ route('user.index') }}">Manajemen User Akun</a></li>
            </ul>
            <!-- /.sub-menu js__content -->
        </li>

    </ul>
    <!-- /.menu js__accordion -->
    <h5 class="title">Kelola Data PKL</h5>
    <!-- /.title -->
    <ul class="menu js__accordion">
        <li>
            <a class="waves-effect parent-item js__control" href="#"><i
                    class="menu-icon fa fa-bar-chart"></i><span>Pengajuan PKL</span><span
                    class="menu-arrow fa fa-angle-down"></span></a>
            <ul class="sub-menu js__content">
                <li><a href="{{ route('pengajuan.index') }}">Pengajuan</a></li>

            </ul>
        </li>
    </ul>
    <!-- /.menu js__accordion -->
    <h5 class="title">Absensi Data PKL</h5>
    <!-- /.title -->
    <ul class="menu js__accordion">
        <li>
            <a class="waves-effect parent-item js__control" href="#"><i
                    class="menu-icon fa fa-bar-chart"></i><span>Pengajuan PKL</span><span
                    class="menu-arrow fa fa-angle-down"></span></a>
            <ul class="sub-menu js__content">
                <li><a href="{{ route('pengajuan.index') }}">Pengajuan</a></li>

            </ul>
            <!-- /.sub-menu js__content -->
        </li>
        <li>
            <a class="waves-effect" href="calendar.html"><i
                    class="menu-icon fa fa-calendar"></i><span>Aktifitas</span></a>
        </li>
    </ul>

</div>
