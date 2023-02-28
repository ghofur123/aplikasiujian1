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
            <div class="input-field col s6">
                <select name="pilih-role" id="pilih-role" class="browser-default">
                    <option value="" disabled selected>Pilih Kelas</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Guru">Guru</option>
                    <option value="Admin">Admin</option>
                </select>
                <label class="active" for="pilih-role">Pilih Role</label>
            </div>
            <div class="input-field col s12">
            </div>
            <table class="datatables-class">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$item->name }}</td>
                        <td>{{$item->email }}</td>
                        <td>**************</td>
                        <td>{{$item->role }}</td>
                        <td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>