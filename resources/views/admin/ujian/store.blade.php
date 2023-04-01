<form action="#" name="ujian-form">
    @csrf
    <div class="input-field col s6">
        <input name="nama_ujian" id="nama_ujian-form" type="text" class="validate">
        <label for="nama_ujian-form">Nama Ujian</label>
    </div>
    <div class="input-field col s3">
        <input name="jumlah_soal" id="jumlah_soal-form" type="number" class="validate">
        <label for="jumlah_soal-form">Jumlah Soal</label>
    </div>
    <div class="input-field col s3">
        <input name="waktu" id="waktu-form" type="number" class="validate">
        <label for="waktu-form">Waktu</label>
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

    <div class="input-field col s6">
        <select name="mapel_id" id="mapel_id-form" class="browser-default">
            <option value="" disabled selected>Pilih Mapel</option>
            @foreach ($mapel as $item)
            <option value="{{$item->id}}">{{$item->nama}}</option>
            @endforeach
        </select>
        <label class="active" for="mapel_id-form">Mapel ID</label>
    </div>
    <div class="input-field col s6">
        <input name="status" id="status-form" value="tidak aktif" readonly>
        <label class="active" for="status-form">Status</label>
    </div>
    <div class="input-field col s6">
        <select name="metode" id="metode-form" class="browser-default">
            <option value="" disabled selected>Pilih Metode</option>
            <option value="terstruktur">Terstruktur</option>
            <option value="tampil satu">tampil satu</option>
            <option value="acak">Acak</option>
        </select>
        <label class="active" for="metode-form">Metode</label>
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>