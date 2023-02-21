<div class="col s12 m12">
    <div class="card  darken-1">
        <div class="card-action blue-grey white-text">
            <a class="btn btn-modal-class modal-trigger" href="#modal1" link="tingkat/form/store">New Data</a>
        </div>
        <div class="card-content ">
            <span class="card-title">{{ $title }}</span>
            <table class="datatables-class">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>tingkat</th>
                        <th>Limit Pilihan</th>
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
                        <td>{{ $item->tingkat_lembaga }}</td>
                        <td>{{ $item->limit_pilihan }}</td>
                        <td>{{ $item->lembaga->nama_lembaga }}</td>
                        <td>
                            <a class="waves-effect waves-light btn btn-modal-class modal-trigger" href="#modal1" link="tingkat/{{ Crypt::encrypt($item->id) }}"><i class="material-icons left">border_color</i></a>
                            <button class="waves-effect red darken-1 btn" name="tingkat-delete-btn" data="{{ Crypt::encrypt($item->id) }}" link="tingkat"><i class="material-icons left">clear</i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>