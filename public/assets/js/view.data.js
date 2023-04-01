import $, {data} from 'jquery';

export function viewAll() {
    $(document).on('click', '.collapsible-click-class', function () {
        $('.progress').show();
        let ujiaId = $('input[name="ujian_id_input"]').val();
        let bankSoalId = $(this).attr('data');
        let idDiv = $(this).attr('data1');
        $('#collapsible-id-' + idDiv).load('view-soal-in-ujian/' + bankSoalId + "/" + ujiaId, function () {
            $('.progress').hide();
        });
    });
    $(document).on('change', 'select[name="kelas_id_select"]', function () {
        $('.progress').show();
        let valueKelasId = $(this).val();
        $('#create-users-siswa').attr('data', valueKelasId);
        $('#kartu-siswa-class').attr('data', valueKelasId);
        $('.table-view-data').load('siswa/view/' + valueKelasId, function () {
            $('.progress').hide();
        });
    });
    $(document).on('click', '.number-exam-class', function () {
        $('.progress').show();
        let idSoal = $(this).attr('data');
        $('.view-soal-class').load('ujian-siswa/' + idSoal, function () {
            $('.progress').hide();
        });
    });
}
