import $, {data} from 'jquery';

export function viewAll() {
    $(document).on('change', 'select[name="kelas_id_select"]', function () {
        $('.progress').show();
        let valueKelasId = $(this).val();
        $('#create-users-siswa').attr('data', valueKelasId);
        $('.table-view-data').load('siswa/view/' + valueKelasId, function () {
            $('.progress').hide();
        });
    });
}
