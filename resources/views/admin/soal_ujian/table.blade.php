<div class="row" style="padding:10px;">
    <span class="card-title">{{ $title }}</span>
    <input type="text" name="ujian_id_input" id="" value="{{$ujian_id}}">
    <ul class="collapsible">
        @php
        $no=1;
        @endphp
        @foreach ($BankSoalPilihan as $BankSoalPilihan)
        <li>
            <div class="collapsible-header collapsible-click-class" data="{{ Crypt::encrypt($BankSoalPilihan->id) }}" data1="{{$BankSoalPilihan->id}}">
                {{ $BankSoalPilihan->nama }} - Mapel {{ $BankSoalPilihan->mapel->nama}}
            </div>
            <div class="collapsible-body" id="collapsible-id-{{$BankSoalPilihan->id}}">
            </div>
        </li>
        @endforeach
    </ul>
</div>