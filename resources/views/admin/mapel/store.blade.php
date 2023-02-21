<form action="#" name="mapel-form">
    @csrf
    <div class="input-field col s6">
        <select name="kelas_id" id="kelas_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Kelas</option>
            @foreach($data as $item)
            <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
            @endforeach
        </select>
        <label class="active" for="kelas_id-form">Kelas</label class="active">
    </div>
    <div class="input-field col s12 autocomplete-class-load-mapel">
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>