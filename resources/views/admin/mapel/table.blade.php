<div class="col s12 m12">
    <div class="card darken-1">
        <div class="card-action blue-grey white-text">
            <a class="btn btn-modal-class modal-trigger" href="#modal1" link="mapel/form/store">New Data</a>
        </div>
        <div class="card-content">
            <span class="card-title">{{ $title }}</span>
            <table class="datatables-class">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mata Pelajaran ID</th>
                        <th>Nama</th>
                        <th>kelas</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->mata_pelajaran_id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nama_kelas }}</td>
                        <td>
                            <a class="waves-effect waves-light btn btn-modal-class modal-trigger" href="#modal1" link="mapel/{{ Crypt::encrypt($item->id) }}"><i class="material-icons left">border_color</i></a>
                            <button class="waves-effect red darken-1 btn" name="mapel-delete-btn" data="{{ Crypt::encrypt($item->id) }}" link="mapel"><i class="material-icons left">clear</i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>