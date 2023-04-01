<input type="hidden" name="ujian_id_form" value="{{$ujian_id}}">
@foreach ($status_ujian as $status_ujian)
@if ($status_ujian->status == 'selesai')
<div class="card tampil-nilai-class">
    <div class="card-content">
        Benar : {{$status_ujian->benar}}
        Salah : {{$status_ujian->salah}}
        Nilai : {{$status_ujian->nilai}}
        Status : {{$status_ujian->status}}
    </div>
    <div class="card-action">
        <button class="btn s-12" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();localStorage.clear();">
            Keluar
        </button>
    </div>
</div>

@else

<div class="row">
    <div id="countdown"></div>
</div>
@php
$no=1;
@endphp
@foreach ($data as $item)
<button class="col s1 btn btn-small number-exam-class {{ $item->id == $item->soal_id ? 'red accent-2' : 'indigo lighten-3'}}" style="margin:5px; width: 30px;" data="{{Crypt::encrypt($item->id)}}">{{$no++}}</button>
@endforeach
@if ($status_ujian->status_jumlah_jawaban == 'selesai')
<button class="btn s-12 selesaikan-ujian" data="{{Crypt::encrypt($status_ujian->ujian_id)}}">selesaikan</button>
@else
@endif
@endif
@endforeach