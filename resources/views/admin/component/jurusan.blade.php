@foreach ($data as $item)
<li class="collection-item collection-option-jur" data="{{$item->jurusan_id}}" data1="{{$item->nama_jurusan}}">{{$item->nama_jurusan.' - '.$item->jurusan_id}}</li>
@endforeach