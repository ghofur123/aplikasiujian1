<div class="col s12 m12">
    <div class="card  darken-1">
        <div class="card-action blue-grey white-text">
            <a class="btn btn-modal-class modal-trigger" href="#modal1" link="ujian/form/store">New Data</a>
        </div>
        <div class="card-content">
            <span class="card-title">{{ $title }}</span>
            <table class="datatables-class">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nama_ujian</th>
                        <th>kelas</th>
                        <th>jumlah_soal</th>
                        <th>waktu</th>
                        <th>mapel</th>
                        <th>status</th>
                        <th>metode</th>
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
                        <td>{{ $item->nama_ujian }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                        <td>{{ $item->jumlah_soal }}</td>
                        <td>{{ $item->waktu }}</td>
                        <td>{{ $item->mapel->nama }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->metode }}</td>
                        <td>
                            <a class="waves-effect waves-light btn menu-item" link="pilih-soal/{{$item->id}}">Pilih Soal</a>
                            <a class="waves-effect waves-light btn btn-modal-class modal-trigger" href="#modal1" link="ujian/{{ Crypt::encrypt($item->id) }}"><i class="material-icons left">border_color</i></a>
                            <button class="waves-effect red darken-1 btn" name="ujian-delete-btn" data="{{ Crypt::encrypt($item->id) }}" link="ujian"><i class="material-icons left">clear</i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>