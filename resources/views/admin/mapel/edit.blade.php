<form action="#" name="mapel-form-edit">
    @csrf
    @foreach ($data as $item)
    <div class="row indigo lighten-4">
        <div class="input-field col s3">
            <input type="hidden" name="id" id="" value="{{ Crypt::encrypt($item->id) }}">
            <input readonly name="mata_pelajaran_id_ii" id="mata_pelajaran_id_ii-form" type="text" class="validate" value="{{ $item->mata_pelajaran_id }}">
            <label for="mata_pelajaran_id_ii-form" class="active">id mata pelajaran</label>
        </div>
        <div class="input-field col s3">
            <input readonly name="nama_ii" id="nama_ii-form" type="text" class="validate" value="{{ $item->nama }}">
            <label for="nama_ii-form" class="active">nama</label>
        </div>
        <div class="input-field col s3">
            <input readonly name="kelas_id_ii" id="kelas_id_ii-form" type="text" class="validate" value="{{ $item->kelas_id }}">
            <label for="kelas_id_ii-form" class="active">kelas</label>
        </div>
    </div>
    @endforeach
    <hr>
    <div class="input-field col s6">
        <select name="kelas_id" id="kelas_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Kelas</option>
            @foreach($kelas as $kelas)
            <option value="{{$item->id}}">{{$kelas->nama_kelas}}</option>
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