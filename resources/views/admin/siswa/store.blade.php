<form action="#" name="siswa-form">
    @csrf
    <div class="input-field col s6">
        <input name="nisn" id="nisn-form" type="text" class="validate">
        <label for="nisn-form">NISN</label>
    </div>
    <div class="input-field col s6">
        <input name="nik" id="nik-form" type="text" class="validate">
        <label for="nik-form">NIK</label>
    </div>
    <div class="input-field col s6">
        <input name="nama" id="nama-form" type="text" class="validate">
        <label for="nama-form">Nama</label>
    </div>
    <div class="input-field col s6">
        <select name="kelas_id" id="kelas_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Kelas</option>
            @foreach ($kelas as $item)
            <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
            @endforeach
        </select>
        <label class="active" for="kelas_id-form">Kelas ID</label>
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>