<div class="col s12 m12">
    <div class="card  darken-1">
        <div class="card-action blue-grey white-text">
            <a class="btn btn-modal-class modal-trigger" href="#modal1" link="guru/form/store">New Data</a>

            <a class='dropdown-trigger btn' href='#' data-target='dropdown-uploads'>Uploads</a>
            <ul id='dropdown-uploads' class='dropdown-content'>
                <li class="btn-modal-class modal-trigger" href="#modal1" link="guru-form-excel"><a href="#">Excel</a></li>
                <li><a href="#">Word</a></li>
            </ul>
            <a class='dropdown-trigger btn' href='#' data-target='dropdown-templates'>Templates</a>
            <ul id='dropdown-templates' class='dropdown-content'>
                <li><a href="download-file/template-data-guru.xlsx">Excel</a></li>
                <li><a href="#">Word</a></li>
            </ul>
        </div>
        <div class="card-content ">
            <span class="card-title">{{ $title }}</span>
            <table class="datatables-class">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>JKL</th>
                        <th>Agama</th>
                        <th>TLP</th>
                        <th>Lembaga</th>
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
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jkl }}</td>
                        <td>{{ $item->agama }}</td>
                        <td>{{ $item->tlp }}</td>
                        <td>{{ $item->lembaga->nama_lembaga }}</td>
                        <td>
                            <a class="waves-effect waves-light btn btn-modal-class modal-trigger" href="#modal1" link="guru/{{ Crypt::encrypt($item->id) }}"><i class="material-icons left">border_color</i></a>
                            <button class="waves-effect red darken-1 btn" name="guru-delete-btn" data="{{ Crypt::encrypt($item->id) }}" link="guru"><i class="material-icons left">clear</i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>