<div class="col s12 m12">
    <div class="card  darken-1">
        <div class="card-action blue-grey white-text">
            <a class="btn btn-modal-class modal-trigger" href="#modal1" link="siswa/form/store">New Data</a>
            <a class='dropdown-trigger btn' href='#' data-target='dropdown-uploads'>Uploads</a>
            <ul id='dropdown-uploads' class='dropdown-content'>
                <li class="btn-modal-class modal-trigger" href="#modal1" link="siswa-form-excel"><a href="#">Excel</a></li>
                <li><a href="#">Word</a></li>
            </ul>

            <a class='dropdown-trigger btn' href='#' data-target='dropdown-templates'>Templates</a>
            <ul id='dropdown-templates' class='dropdown-content'>
                <li><a href="download-file/template-data-siswa.xlsx">Excel</a></li>
                <li><a href="#">Word</a></li>
            </ul>

            <a class='dropdown-trigger btn' href='#' data-target='dropdown-users'>Users Data</a>
            <ul id='dropdown-users' class='dropdown-content'>
                <li id="create-users-siswa" data=""><a href="#">Create Users</a></li>
                <li id="kartu-siswa-class" data=""><a href="#">Kartu Siswa</a></li>
            </ul>
        </div>
        <div class="card-content">
            <div class="input-field col s6">
                <select name="kelas_id_select" id="kelas_id-form" class="browser-default">
                    <option value="" disabled>Pilih Kelas</option>
                    @foreach ($kelas as $kelas)
                    <option value="{{Crypt::encrypt($kelas->id)}}">{{ $kelas->nama_kelas }}</option>
                    @endforeach
                </select>
                <label class="active" for="kelas_id-form">Kelas</label>
            </div>
            <table class="datatables-class table-view-data">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nisn</th>
                        <th>nik</th>
                        <th>nama</th>
                        <th>kelas</th>
                        <th>ACT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>