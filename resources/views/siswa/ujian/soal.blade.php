@foreach ($data as $item)
<div class="row" style="padding: 10px;">
    <div class="col s12">
        <p>{{$item->soal}}</p>
        <input type="hidden" name="id_soal" id="" value="{{Crypt::encrypt($item->id)}}">
    </div>
    <div class="col s12">
        <label>
            <input type="radio" name="pilihan-radio" id="pilihan-a" value="a" {{ $item->jawaban == 'a' ? 'checked' : ''}} />
            <span>{{$item->a}}</span>
        </label>
    </div>
    <div class="col s12">
        <label>
            <input type="radio" name="pilihan-radio" id="pilihan-b" value="b" {{ $item->jawaban == 'b' ? 'checked' : ''}} />
            <span>{{$item->b}}</span>
        </label>
    </div>
    <div class="col s12">
        <label>
            <input type="radio" name="pilihan-radio" id="pilihan-c" value="c" {{ $item->jawaban == 'c' ? 'checked' : ''}} />
            <span>{{$item->c}}</span>
        </label>
    </div>
    <div class="col s12">
        <label>
            <input type="radio" name="pilihan-radio" id="pilihan-d" value="d" {{ $item->jawaban == 'd' ? 'checked' : ''}} />
            <span>{{$item->d}}</span>
        </label>
    </div>
    <div class="col s12">
        <label>
            <input type="radio" name="pilihan-radio" id="pilihan-e" value="e" {{ $item->jawaban == 'e' ? 'checked' : ''}} />
            <span>{{$item->e}}</span>
        </label>
    </div>
</div>
@endforeach