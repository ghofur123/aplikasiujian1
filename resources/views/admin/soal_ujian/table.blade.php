<div class="row" style="padding:10px;">
    <span class="card-title">{{ $title }}</span>
    <ul class="collapsible">
        @foreach ($BankSoalPilihan as $BankSoalPilihan)
        <li>
            <div class="collapsible-header">
                {{ $BankSoalPilihan->nama }} - Mapel {{ $BankSoalPilihan->mapel->nama}}
            </div>
            <div class="collapsible-body">

            </div>
        </li>
        @endforeach
    </ul>
</div>