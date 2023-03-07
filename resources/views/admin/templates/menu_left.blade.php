<nav class="blue-grey">
    <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large">
        <i class="material-icons">menu</i>
    </a>
</nav>
<ul id="slide-out" class="sidenav">
    <li class="menu-item" link="lembaga">
        <a href="#">
            <i class="material-icons">account_balance</i>Lembaga
        </a>
    </li>
    <li class="menu-item" link="guru">
        <a href="#">
            <i class="material-icons">account_circle</i>Guru
        </a>
    </li>
    <li class="menu-item" link="jurusan">
        <a href="#">
            <i class="material-icons">airplay</i>Jurusan
        </a>
    </li>
    <li class="menu-item" link="kelas">
        <a href="#">
            <i class="material-icons">assignment</i>Kelas
        </a>
    </li>
    <li class="menu-item" link="tingkat">
        <a href="#">
            <i class="material-icons">arrow_upward</i>Tingkat
        </a>
    </li>
    <li class="menu-item" link="mapel">
        <a href="#">
            <i class="material-icons">chrome_reader_mode</i>Mata Pelajaran
        </a>
    </li>
    <li class="menu-item" link="siswa">
        <a href="#">
            <i class="material-icons">group</i>Siswa
        </a>
    </li>
    <li class="menu-item" link="ujian">
        <a href="#">
            <i class="material-icons">add_to_queue</i>Ujian
        </a>
    </li>
    <li class="menu-item" link="bank-soal-pilihan">
        <a href="#">
            <i class="material-icons">sd_storage</i>Bank Soal
        </a>
    </li>
    <li class="menu-item" link="nilai">
        <a href="#">
            <i class="material-icons">add_to_queue</i>Nilai
        </a>
    </li>
    <li class="menu-item" link="users">
        <a href="#">
            <i class="material-icons">account_circle</i>Users
        </a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Siswa</a></li>
    <li class="menu-item" link="ujian-siswa">
        <a href="#">
            <i class="material-icons">alarm</i>Ujian
        </a>
    </li>
    <li><a class="subheader">Subheader</a></li>
    <li class="menu-item" link="setting">
        <a href="#">
            <i class="material-icons">build</i>Pengaturan
        </a>
    </li>
    <li class="menu-item" link="logout">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons">close</i>Log out
        </a>
    </li>

</ul>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>