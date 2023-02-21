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
        </div>
        <div class="card-content">
            <span class="card-title">{{ $title }}</span>
            <table class="datatables-class">
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
                    @php
                    $no=1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                        <td>
                            <a class="waves-effect waves-light btn btn-modal-class modal-trigger" href="#modal1" link="siswa/{{ Crypt::encrypt($item->id) }}"><i class="material-icons left">border_color</i></a>
                            <button class="waves-effect red darken-1 btn" name="siswa-delete-btn" data="{{ Crypt::encrypt($item->id) }}" link="siswa"><i class="material-icons left">clear</i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>