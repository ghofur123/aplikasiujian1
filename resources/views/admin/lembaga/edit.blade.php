<form action="#" name="lembaga-edit">
    @csrf
    @foreach ($data as $item)
    <input name="id" type="hidden" value="{{ $item->id }}">
    <div class="input-field col s6">
        <input name="npsn" id="npsn-form" type="text" class="validate" value="{{ $item->npsn }}">
        <label for="npsn-form" class="active">NPSN</label>
    </div>
    <div class="input-field col s6">
        <input name="nama_lembaga" id="nama-lembaga-form" type="text" class="validate" value="{{ $item->nama_lembaga }}">
        <label for="nama-lembaga-form" class="active">Nama Lembaga</label>
    </div>
    <div class="input-field col s12">
        <textarea name="alamat" id="alamat-form" class="materialize-textarea">{{ $item->alamat }}</textarea>
        <label for="alamat-form" class="active">Alamat</label>
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    @endforeach
</form>