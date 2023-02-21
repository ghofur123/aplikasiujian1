<form action="#" name="bank-soal-pilihan-form">
    @csrf
    <div class="input-field col s6">
        <input name="nama" id="nama-form" type="text" class="validate">
        <label for="nama-form">Nama Ujian</label>
    </div>
    <div class="input-field col s6">
        <select name="mapel_id" id="mapel_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Mapel</option>
            @foreach ($mapel as $item)
            <option value="{{$item->id}}">{{$item->nama}}</option>
            @endforeach
        </select>
        <label class="active" for="mapel_id-form">Mapel ID</label>
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>