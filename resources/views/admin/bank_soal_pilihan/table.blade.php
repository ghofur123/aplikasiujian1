<div class="col s12 m12">
    <div class="card  darken-1">
        <div class="card-action blue-grey white-text">
            <a class="btn btn-modal-class modal-trigger" href="#modal1" link="bank-soal-pilihan/form/store">New Data</a>
        </div>
        <div class="card-content">
            <span class="card-title">{{ $title }}</span>
            <table class="datatables-class">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Mapel</th>
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
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->mapel->nama }}</td>
                        <td>
                            <a class="waves-effect deep-purple darken-1 btn menu-item" link="soal/index/{{ Crypt::encrypt($item->id) }}"><i class="material-icons left">add_to_queue</i></a>
                            <a class="waves-effect waves-light btn btn-modal-class modal-trigger" href="#modal1" link="bank-soal-pilihan/{{ Crypt::encrypt($item->id) }}"><i class="material-icons left">border_color</i></a>
                            <button class="waves-effect red darken-1 btn" name="bank-soal-pilihan-delete-btn" data="{{ Crypt::encrypt($item->id) }}" link="bank-soal-pilihan"><i class="material-icons left">clear</i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>