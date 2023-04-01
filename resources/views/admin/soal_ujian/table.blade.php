<div class="row" style="padding:10px;">
    <span class="card-title">{{ $title }}</span>
    <input type="hidden" name="ujian_id_input" id="" value="{{Crypt::encrypt($ujian_id)}}">
    <ul class="collapsible">
        @php
        $no=1;
        @endphp
        @foreach ($BankSoalPilihan as $BankSoalPilihan)
        <li>
            <div class="collapsible-header collapsible-click-class" data="{{ Crypt::encrypt($BankSoalPilihan->id) }}" data1="{{$BankSoalPilihan->id}}">
                {{ $BankSoalPilihan->nama }}
                <span class="badge blue" style="color:antiquewhite;">{{ $BankSoalPilihan->nama_kelas}}</span>
                <span class="badge red" style="color:antiquewhite;">{{ $BankSoalPilihan->mapel}}</span>
            </div>
            <div class="collapsible-body" id="collapsible-id-{{$BankSoalPilihan->id}}">
            </div>
        </li>
        @endforeach
    </ul>
</div>