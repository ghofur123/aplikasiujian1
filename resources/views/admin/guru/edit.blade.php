<form action="#" name="guru-form-edit">
    @csrf
    @foreach ($data as $item)
    <input type="hidden" name="id" value="{{Crypt::encrypt($item->id)}}">
    <div class="input-field col s6">
        <input name="nama" id="nama-form" type="text" class="validate" value="{{ $item->nama }}">
        <label class="active" for="nama-form">Nama</label>
    </div>
    <div class="input-field col s6">
        <input name="nik" id="nik-form" type="text" class="validate" value="{{ $item->nik }}">
        <label class="active" for="nik-form">NIK</label>
    </div>
    <div class="input-field col s6">
        <select name="jkl" class="browser-default">
            <option value="" disabled {{ $item->jkl == null ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
            <option value="laki-laki" {{ $item->jkl == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="perempuan" {{ $item->jkl == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        <label class="active" for="jkl-form">Jenis Kelamin</label>
    </div>
    <div class="input-field col s6">
        <select name="agama" class="browser-default">
            <option value="" disabled {{ $item->agama == null ? 'selected' : '' }}>Pilih Agama</option>
            <option value="islam" {{ $item->agama == 'islam' ? 'selected' : '' }}>Islam</option>
            <option value="kristen" {{ $item->agama == 'kristen' ? 'selected' : '' }}>Kristen</option>
            <option value="hindu" {{ $item->agama == 'hindu' ? 'selected' : '' }}>Hindu</option>
            <option value="budha" {{ $item->agama == 'budha' ? 'selected' : '' }}>Budha</option>
            <option value="katholik" {{ $item->agama == 'katholik' ? 'selected' : '' }}>Katholik</option>
        </select>
        <label class="active" for="agama-form">Agama</label>
    </div>
    <div class="input-field col s6">
        <input name="tlp" id="tlp-form" type="text" class="validate" value="{{ $item->tlp }}">
        <label class="active" for="tlp-form">Telepon</label>
    </div>
    <div class="input-field col s12 autocomplete-class-load">
    </div>
    @endforeach
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>