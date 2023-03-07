<input type="hidden" name="ujian_id_form" value="{{$ujian_id}}">
@php
$no=1;
@endphp
@foreach ($data as $item)
<button class="col s1 btn number-exam-class {{ $item->id == $item->soal_id ? 'red accent-2' : 'indigo lighten-3'}}" style="margin:5px; width: 30px;" data="{{Crypt::encrypt($item->id)}}">{{$no++}}</button>
@endforeach