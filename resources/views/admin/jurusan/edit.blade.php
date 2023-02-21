<form action="#" name="jurusan-form-edit">
    @csrf
    @foreach ($data as $item)
    <input type="hidden" name="id" value="{{ Crypt::encrypt($item->id) }}">
    <div class="input-field col s6">
        <input disabled name="nama_jurusan-11" id="nama-jurusan-form-11" type="text" class="validate" value="{{ $item->ref_nama_jurusan }}">
        <label class="active" for="nama-jurusan-form-11">Nama Jurusan</label>
    </div>
    <div class="input-field col s12 autocomplete-class-load-jur">
    </div>
    <div class="input-field col s12 autocomplete-class-load">
    </div>
    @endforeach
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>