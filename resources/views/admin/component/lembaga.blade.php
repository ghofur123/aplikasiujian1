@foreach ($data as $item)
<li class="collection-item collection-option" data="{{$item->id}}" data1="{{$item->nama_lembaga}}">{{$item->nama_lembaga}}</li>
@endforeach