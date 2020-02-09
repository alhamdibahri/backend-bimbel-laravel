<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
        <ul id="sidebarnav" class="p-t-30">
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('') }}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">User</span></a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ url('user') }}" class="sidebar-link"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Data User</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('user/create') }}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu">Input User</span></a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('admin') }}" aria-expanded="false"><i class="fas fa-users"></i> <span class="hide-menu"> Admin </span></a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('guru') }}" aria-expanded="false"><i class="fas fa-user-circle"></i><span class="hide-menu"> Guru</span></a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('siswa') }}" aria-expanded="false"><i class="fas fa-user-secret"></i><span class="hide-menu"> Siswa</span></a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-newspaper"></i><span class="hide-menu">Kategori Kelas</span></a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ url('category-kelas') }}" class="sidebar-link"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Data Kategori Kelas</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('category-kelas/create') }}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu">Input Kategori Kelas</span></a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-pencil-alt"></i><span class="hide-menu">Mata Pelajaran</span></a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ url('mata-pelajaran') }}" class="sidebar-link"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Data Materi Pelajaran</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('mata-pelajaran/create') }}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu">Input Materi Pelajaran</span></a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-book"></i><span class="hide-menu">Berita</span></a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="{{ url('berita') }}" class="sidebar-link"><i class="mdi mdi-border-outside"></i><span class="hide-menu">Data Berita</span></a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ url('berita/create') }}" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu">Input Berita</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        </nav>
        <!-- End Sidebar navigation --></div>
    <!-- End Sidebar scroll--></aside>