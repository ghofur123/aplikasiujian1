<form action="#" name="soal-form-excel" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="file-field input-field col s12">
        <h6>File Excel dengan Extensi Xlsx atau xls</h6>
        <div class="btn">
            <span>File</span>
            <input type="file" name="file" placeholder="files XLSX atau XLS">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
    <div class="input-field col s12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>