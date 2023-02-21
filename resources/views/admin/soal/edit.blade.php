<form action="#" name="soal-form-edit" style="margin:10px;">
    @csrf
    @foreach ($soal as $soal)
    <input type="hidden" name="id" id="" value="{{Crypt::encrypt($soal->id)}}">
    <ul class="collapsible">
        <li>
            <div class="collapsible-header">
                soal
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="soal" id="soal-form" class="materialize-textarea">{{$soal->soal}}</textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="a" {{ $soal->jawaban == 'a' ? 'checked' : '' }} />
                    <span>A</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="a" id="a-form" class="materialize-textarea">{{$soal->a}}</textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="b" {{ $soal->jawaban == 'b' ? 'checked' : '' }} />
                    <span>B</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="b" id="b-form" class="materialize-textarea">{{$soal->b}}</textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="c" {{ $soal->jawaban == 'c' ? 'checked' : '' }} />
                    <span>C</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="c" id="c-form" class="materialize-textarea">{{$soal->c}}</textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="d" {{ $soal->jawaban == 'd' ? 'checked' : '' }} />
                    <span>D</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="d" id="d-form" class="materialize-textarea">{{$soal->d}}</textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="e" {{ $soal->jawaban == 'e' ? 'checked' : '' }} />
                    <span>E</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="e" id="e-form" class="materialize-textarea">{{$soal->e}}</textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                Pembahasan
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="pembahasan" id="pembahasan-form" class="materialize-textarea">{{$soal->pembahasan}}</textarea>
                </span>
            </div>
        </li>
    </ul>
    <input name="bank_soal_pilihan_id" id="bank_soal_pilihan_id-form" type="hidden" class="validate" value="{{Crypt::encrypt($soal->bank_soal_pilihan_id)}}">
    @endforeach
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn light-green menu-item" link='soal/index/{{Crypt::encrypt($soal->bank_soal_pilihan_id)}}'>Ke Data Soal</button>
    </div>
</form>