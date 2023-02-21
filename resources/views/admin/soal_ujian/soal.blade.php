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
        </tr>
        @endforeach
    </tbody>
</table>