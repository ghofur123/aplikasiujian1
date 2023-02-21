<form action="#" name="kelas-form">
    @csrf
    <div class="input-field col s12">
        <input name="nama_kelas" id="nama_kelas-form" type="text" class="validate">
        <label for="nama_kelas-form">Nama Kelas</label>
    </div>
    <div class="input-field col s6">
        <select name="jurusan_id" id="jurusan_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Jurusan</option>
            @foreach($data_jurusan as $jurusan)
            <option value="{{$jurusan->id}}">{{$jurusan->ref_nama_jurusan}}</option>
            @endforeach
        </select>
        <label class="active" for="jurusan_id-form">Jurusan</label>
    </div>
    <div class="input-field col s6">
        <select name="wali_kelas_id" id="wali_kelas_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Wali Kelas</option>
            @foreach($data_guru as $guru)
            <option value="{{$guru->id}}">{{$guru->nama}}</option>
            @endforeach
        </select>
        <label class="active" for="wali_kelas_id-form">Wali Kelas</label>
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>