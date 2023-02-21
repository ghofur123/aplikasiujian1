<form action="#" name="soal-form" style="margin:10px;">
    @csrf
    <ul class="collapsible">
        <li>
            <div class="collapsible-header">
                soal
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="soal" id="soal-form" class="materialize-textarea"></textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="a" />
                    <span>A</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="a" id="a-form" class="materialize-textarea"></textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="b" />
                    <span>B</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="b" id="b-form" class="materialize-textarea"></textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="c" />
                    <span>C</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="c" id="c-form" class="materialize-textarea"></textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="d" />
                    <span>D</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="d" id="d-form" class="materialize-textarea"></textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <label>
                    <input name="jawaban" type="radio" value="e" />
                    <span>E</span>
                </label>
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="e" id="e-form" class="materialize-textarea"></textarea>
                </span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                Pembahasan
            </div>
            <div class="collapsible-body">
                <span>
                    <textarea name="pembahasan" id="pembahasan-form" class="materialize-textarea"></textarea>
                </span>
            </div>
        </li>
    </ul>
    <input name="bank_soal_pilihan_id" id="bank_soal_pilihan_id-form" type="hidden" class="validate" value="{{$bank_soal_pilihan_id}}">
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn light-green menu-item" link='soal/index/{{$bank_soal_pilihan_id}}'>Ke Data Soal</button>
    </div>
</form>