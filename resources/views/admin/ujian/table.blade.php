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
                        <th>jumlah soal</th>
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
                        <td>{{ $item->nama_kelas }}</td>
                        <td>
                            <span class="btn blue">{{$item->jumlah_soal}}</span>
                            <span class="btn red">{{$item->jumlah_soal_pilih}}</span>
                        </td>
                        <td>{{ $item->waktu }}</td>
                        <td>{{ $item->nama_mapel }}</td>
                        <td>
                            <button type="button" class="btn btn-aktifkan-class {{$item->status == 'aktif' ? 'blue' : 'red'}}" data="{{ Crypt::encrypt($item->id) }}" data1="{{ $item->status }}" data2="{{$item->jumlah_soal}}" data3="{{$item->jumlah_soal_pilih}}">{{ $item->status }}</button>
                        </td>
                        <td>{{ $item->metode }}</td>
                        <td>
                            <a class="waves-effect waves-light btn menu-item " link="pilih-soal/{{$item->id}}">Pilih Soal</a>
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
