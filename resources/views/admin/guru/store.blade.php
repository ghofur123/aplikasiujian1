<form action="#" name="guru-form">
    @csrf

    <div class="input-field col s6">
        <input name="nama" id="nama-form" type="text" class="validate">
        <label for="nama-form">Nama</label>
    </div>
    <div class="input-field col s6">
        <input name="nik" id="nik-form" type="text" class="validate">
        <label for="nik-form">NIK</label>
    </div>
    <div class="input-field col s6">
        <select name="jkl" class="browser-default">
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
        <label class="active" for="jkl-form">Jenis Kelamin</label>
    </div>
    <div class="input-field col s6">
        <select name="agama" class="browser-default">
            <option value="" disabled selected>Pilih Agama</option>
            <option value="islam">Islam</option>
            <option value="kristen">Kristen</option>
            <option value="hindu">Hindu</option>
            <option value="budha">Budha</option>
            <option value="katholik">Katholik</option>
        </select>
        <label class="active" for="agama-form">Agama</label>
    </div>
    <div class="input-field col s6">
        <input name="tlp" id="tlp-form" type="text" class="validate">
        <label for="tlp-form">Telepon</label>
    </div>
    <div class="input-field col s12 autocomplete-class-load">
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>