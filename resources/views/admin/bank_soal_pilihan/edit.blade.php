<form action="#" name="bank-soal-pilihan-form-edit">
    @csrf
    @foreach ($bank_soal as $bank_soal)
    <input type="hidden" name="id" value="{{Crypt::encrypt($bank_soal->id)}}">
    <div class="input-field col s6">
        <input name="nama" id="nama-form" type="text" class="validate" value="{{ $bank_soal->nama }}">
        <label class="active" for="nama-form">Nama Ujian</label>
    </div>
    <div class="input-field col s6">
        <select name="mapel_id" id="mapel_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Mapel</option>
            @foreach ($mapel as $item)
            <option value="{{$item->id}}" {{ $bank_soal->mapel_id = $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
            @endforeach
        </select>
        <label class="active" for="mapel_id-form">Mapel ID</label>
    </div>
    @endforeach
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>