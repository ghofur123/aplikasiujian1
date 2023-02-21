<div class="col s12 m12">
    <div class="card  darken-1">
        <div class="card-action blue-grey white-text">
            <a class="btn btn-modal-class modal-trigger" href="#modal1" link="lembaga-form">New Data</a>
        </div>
        <div class="card-content">
            <span class="card-title">{{ $title }}</span>
            <table class="datatables-class">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>npsn</th>
                        <th>nama lembaga</th>
                        <th>alamat</th>
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
                        <td>{{ $item->npsn }}</td>
                        <td>{{ $item->nama_lembaga }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a class="waves-effect waves-light btn btn-modal-class modal-trigger" href="#modal1" link="lembaga/{{ Crypt::encrypt($item->id) }}"><i class="material-icons left">border_color</i></a>
                            <button class="waves-effect red darken-1 btn" name="lembaga-delete-btn" data="{{ Crypt::encrypt($item->id) }}" link="lembaga"><i class="material-icons left">clear</i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>