<form action="#" name="tingkat-form">
    @csrf
    <div class="input-field col s6">
        <select name="tingkat_lembaga" id="kode-form" class="browser-default">
            <option value="" disabled selected>Pilih Tingkat Lembaga</option>
            <option value="sd">SD se Derajat</option>
            <option value="smp">SMP se Derajat</option>
            <option value="sma">SMA se Derajat</option>
        </select>
        <label class="active" for="kode-form">Tingkat Lembaga</label>
    </div>
    <div class="input-field col s6">
        <select name="limit_pilihan" id="limit_pilihan-form" class="browser-default">
            <option value="" disabled selected>Pilih Limit Pilihan</option>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
            <option value="e">E</option>
        </select>
        <label class="active" for="limit_pilihan-form">Limit Pilihan</label>
    </div>
    <div class="input-field col s12 autocomplete-class-load">
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>