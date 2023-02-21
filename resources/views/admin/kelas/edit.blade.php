<form action="#" name="kelas-form-edit">
    @csrf
    @foreach ($data as $kelas)
    <div class="input-field col s12">
        <input type="hidden" name="id" value="{{Crypt::encrypt($kelas->id)}}">
        <input name="nama_kelas" id="nama_kelas-form" type="text" class="validate" value="{{ $kelas->nama_kelas }}">
        <label class="active" for="nama_kelas-form">Nama Kelas</label class="active">
    </div>
    <div class="input-field col s6">
        <select name="jurusan_id" id="jurusan_id-form" class="browser-default">
            <option value="" disabled>Pilih Jurusan</option>
            @foreach($data_jurusan as $jurusan)
            <option value="{{$jurusan->id}}" {{ $kelas->jurusan_id == $jurusan->id ? 'selected' : '' }}>{{$jurusan->ref_nama_jurusan}}</option>
            @endforeach
        </select>
        <label class="active" for="jurusan_id-form">Jurusan</label class="active">
    </div>
    <div class="input-field col s6">
        <select name="wali_kelas_id" id="wali_kelas_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Wali Kelas</option>
            @foreach($data_guru as $guru)
            <option value="{{$guru->id}}" {{ $guru->id == $kelas->wali_kelas_id ? 'selected' : '' }}>{{$guru->nama}}</option>
            @endforeach
        </select>
        <label class="active" for="wali_kelas_id-form">Wali Kelas</label class="active">
    </div>
    @endforeach
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>