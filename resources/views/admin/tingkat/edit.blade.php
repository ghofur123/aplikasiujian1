<form action="#" name="tingkat-form-edit">
    @csrf
    @foreach ($data as $item)
    <div class="input-field col s6">
        <input type="hidden" name="id" value="{{Crypt::encrypt($item->id)}}">
        <select name="tingkat_lembaga" id="kode-form" class="browser-default">
            <option value="" disabled {{ $item->tingkat_lembaga == null ? 'selected' : '' }}>Pilih Tingkat Lembaga</option>
            <option value="sd" {{ $item->tingkat_lembaga == 'sd' ? 'selected' : '' }}>SD se Derajat</option>
            <option value="smp" {{ $item->tingkat_lembaga == 'smp' ? 'selected' : '' }}>SMP se Derajat</option>
            <option value="sma" {{ $item->tingkat_lembaga == 'sma' ? 'selected' : '' }}>SMA se Derajat</option>
        </select>
        <label class="active" for="kode-form">Tingkat Lembaga</label>
    </div>
    <div class="input-field col s6">
        <select name="limit_pilihan" id="limit_pilihan-form" class="browser-default">
            <option value="" disabled {{ $item->limit_pilihan == null ? 'selected' : '' }}>Pilih Limit Pilihan</option>
            <option value="a" {{ $item->limit_pilihan == 'a' ? 'selected' : '' }}>A</option>
            <option value="b" {{ $item->limit_pilihan == 'b' ? 'selected' : '' }}>B</option>
            <option value="c" {{ $item->limit_pilihan == 'c' ? 'selected' : '' }}>C</option>
            <option value="d" {{ $item->limit_pilihan == 'd' ? 'selected' : '' }}>D</option>
            <option value="e" {{ $item->limit_pilihan == 'e' ? 'selected' : '' }}>E</option>
        </select>
        <label class="active" for="limit_pilihan-form">Limit Pilihan</label>
    </div>
    <div class="input-field col s12 autocomplete-class-load">
    </div>
    @endforeach
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>