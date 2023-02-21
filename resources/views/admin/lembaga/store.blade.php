<form action="#" name="lembaga-form">
    @csrf
    <div class="input-field col s6">
        <input name="npsn" id="npsn-form" type="text" class="validate">
        <label for="npsn-form">NPSN</label>
    </div>
    <div class="input-field col s6">
        <input name="nama_lembaga" id="nama-lembaga-form" type="text" class="validate">
        <label for="nama-lembaga-form">Nama Lembaga</label>
    </div>
    <div class="input-field col s12">
        <textarea name="alamat" id="alamat-form" class="materialize-textarea"></textarea>
        <label for="alamat-form">Alamat</label>
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>