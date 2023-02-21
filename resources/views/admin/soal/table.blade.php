<div class="col s12 m12">
    <div class="card  darken-1">
        <div class="card-action blue-grey white-text">
            <a class="btn btn-modal-class menu-item" link="soal/form/store/{{$bank_soal_pilihan_id}}">New Data</a>
            <a class='dropdown-trigger btn' href='#' data-target='dropdown-uploads'>Uploads</a>
            <ul id='dropdown-uploads' class='dropdown-content'>
                <li class="btn-modal-class modal-trigger" href="#modal1" link="soal-import/form"><a href="#">Excel</a></li>
                <li><a href="#">Word</a></li>
            </ul>
            <a class='dropdown-trigger btn' href='#' data-target='dropdown-templates'>Templates</a>
            <ul id='dropdown-templates' class='dropdown-content'>
                <li><a href="download-file/template-data-soal.xlsx">Excel</a></li>
                <li><a href="#">Word</a></li>
            </ul>
        </div>
        <div class="card-content">
            <span class="card-title">{{ $title }}</span>
            <table class="datatables-class">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Soal</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>E</th>
                        <th>Jawaban</th>
                        <th>Pembahasan</th>
                        <th>ID Bank Soal Pilihan</th>
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
                        <td>{!! $item->soal !!}</td>
                        <td>{!! $item->a !!}</td>
                        <td>{!! $item->b !!}</td>
                        <td>{!! $item->c !!}</td>
                        <td>{!! $item->d !!}</td>
                        <td>{!! $item->e !!}</td>
                        <td>{{ $item->jawaban }}</td>
                        <td>{!! $item->pembahasan !!}</td>
                        <td>{{ $item->bank_soal_pilihan_id }} {{session('bank_soal_pilihan_id')}}</td>
                        <td>
                            <a class="waves-effect waves-light btn menu-item" link="soal/{{ Crypt::encrypt($item->id) }}"><i class="material-icons left">border_color</i></a>
                            <button class="waves-effect red darken-1 btn" name="soal-delete-btn" data="{{ Crypt::encrypt($item->id) }}" data1="soal/index/{{$bank_soal_pilihan_id}}" link="soal"><i class="material-icons left">clear</i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>