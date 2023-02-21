<form action="#" name="siswa-form-edit">
    @csrf
    @foreach ($siswa as $siswa)
    <div class="input-field col s6">
        <input type="hidden" name="id" id="" value="{{Crypt::encrypt($siswa->id)}}">
        <input name="nisn" id="nisn-form" type="text" class="validate" value="{{$siswa->nisn}}">
        <label class="active" for="nisn-form">NISN</label>
    </div>
    <div class="input-field col s6">
        <input name="nik" id="nik-form" type="text" class="validate" value="{{$siswa->nik}}">
        <label class="active" for="nik-form">NIK</label>
    </div>
    <div class="input-field col s6">
        <input name="nama" id="nama-form" type="text" class="validate" value="{{$siswa->nama}}">
        <label class="active" for="nama-form">Nama</label>
    </div>
    <div class="input-field col s6">
        <select name="kelas_id" id="kelas_id-form" class="browser-default">
            <option value="" disabled>Pilih Kelas</option>
            @foreach ($kelas as $kelas)
            <option value="{{$kelas->id}}" {{ $siswa->kelas_id == $kelas->id ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
            @endforeach
        </select>
        <label class="active" for="kelas_id-form">Kelas ID</label>
    </div>
    @endforeach
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Ubah</button>
    </div>
</form>