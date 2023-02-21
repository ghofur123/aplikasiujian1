@foreach ($data as $item)
<li class="collection-item collection-option-mapel" data="{{$item->mata_pelajaran_id}}" data1="{{$item->nama}}">{{$item->mata_pelajaran_id.' - '.$item->nama}}</li>
@endforeach