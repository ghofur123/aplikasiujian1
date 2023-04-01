<div class="col s12 m12">
    <div class="card  darken-1">
        <div class="card-content">
            <table class="datatables-class">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nama ujian</th>
                        <th>kelas</th>
                        <th>jumlah soal</th>
                        <th>waktu</th>
                        <th>mapel</th>
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
                        <td>
                            <button type="button" class="btn mulai-ujian-class" data="{{Crypt::encrypt($item->id)}}" data1="{{ $item->waktu }}">Mulai Ujian</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
