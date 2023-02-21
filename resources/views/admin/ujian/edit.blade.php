<form action="#" name="ujian-form-edit">
    @csrf
    @foreach ($ujian as $ujian)
    <input type="hidden" name="id" id="" value="{{ Crypt::encrypt($ujian->id) }}">
    <div class="input-field col s6">
        <input name="nama_ujian" id="nama_ujian-form" type="text" class="validate" value="{{$ujian->nama_ujian}}">
        <label class="active" for="nama_ujian-form">Nama Ujian</label>
    </div>
    <div class="input-field col s3">
        <input name="jumlah_soal" id="jumlah_soal-form" type="number" class="validate" value="{{$ujian->jumlah_soal}}">
        <label class="active" for="jumlah_soal-form">Jumlah Soal</label>
    </div>
    <div class="input-field col s3">
        <input name="waktu" id="waktu-form" type="number" class="validate" value="{{$ujian->waktu}}">
        <label class="active" for="waktu-form">Waktu</label>
    </div>
    <div class="input-field col s6">
        <select name="kelas_id" id="kelas_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Kelas</option>
            @foreach ($kelas as $kelas)
            <option value="{{$kelas->id}}" {{ $ujian->kelas_id == $kelas->id ? 'selected' : '' }}>{{$kelas->nama_kelas}}</option>
            @endforeach
        </select>
        <label class="active" for="kelas_id-form">Kelas ID</label>
    </div>

    <div class="input-field col s6">
        <select name="mapel_id" id="mapel_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Mapel</option>
            @foreach ($mapel as $mapel)
            <option value="{{$mapel->id}}" {{ $ujian->mapel_id == $mapel->id ? 'selected' : '' }}>{{$mapel->nama}}</option>
            @endforeach
        </select>
        <label class="active" for="mapel_id-form">Mapel ID</label>
    </div>
    <div class="input-field col s6">
        <select name="status" id="status-form" class="browser-default">
            <option value="" disabled selected>Pilih Status</option>
            <option value="aktif" {{ $ujian->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="tidak aktif" {{ $ujian->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
        <label class="active" for="status-form">Status</label>
    </div>
    <div class="input-field col s6">
        <select name="metode" id="metode-form" class="browser-default">
            <option value="" disabled selected>Pilih Metode</option>
            <option value="terstruktur" {{ $ujian->metode == 'terstruktur' ? 'selected' : '' }}>Terstruktur</option>
            <option value="tampil satu" {{ $ujian->metode == 'tampil satu' ? 'selected' : '' }}>tampil satu</option>
            <option value="acak" {{ $ujian->metode == 'acak' ? 'selected' : '' }}>Acak</option>
        </select>
        <label class="active" for="metode-form">Metode</label>
    </div>
    @endforeach
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>