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