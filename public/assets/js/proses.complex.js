import $, {data} from 'jquery';
import {AjaxProsessData} from './modul.ajax';
import {openFullscreen, closeFullscreen, eventKeyboard} from './modul.event';
import {AjaxProsessDataPost} from './modul.ajax';


export function prosesComplex() {
    // create users
    // insert data siswa ke users
    $(document).on('click', '#create-users-siswa', function () {
        $('.progress').show();
        let valueKelasId = $(this).attr('data');
        if (valueKelasId.length > 0) {
            AjaxProsessData('users/get', valueKelasId, function (data) {
                $('.progress').hide();
                if (data.success == true) {
                    alert('User Berhasil di Buat');
                } else {
                    alert('User Gagal di Buat');
                }
            });
        } else {
            alert('Pilih Kelas Lebih Dulu');
            $('.progress').hide();
        }
    });
    // kartu siswa
    $(document).on('click', '#kartu-siswa-class', function () {
        $('.progress').show();
        let valueKelasId = $(this).attr('data');
        if (valueKelasId.length > 0) {
            window.open('kartu-siswa/kartu/' + valueKelasId, '_blank');
            $('.progress').hide();
        } else {
            alert('Pilih Kelas Lebih Dulu');
            $('.progress').hide();
        }
    });
    // mulai ujian
    $(document).on('click', '.mulai-ujian-class', function () {
        let idUjian = $(this).attr('data');
        if (confirm('Akan memulai ujian...?')) { // openFullscreen();
            $('.progress').show();
            $('.content-load-class').load('ujian-siswa/mulai', function () {
                $('.number-load-class').load('ujian-siswa/number/' + idUjian, function () {
                    $('.progress').hide();
                });
            });

        }
    });
    // simpan dan update jawaban
    $(document).on('click', 'input[name="pilihan-radio"]', function () {
        $('.progress').show();
        let ujianId = $('input[name="ujian_id_form"]').val();
        let dataSet = {
            'ujian_id': ujianId,
            'soal_id': $('input[name="id_soal"]').val(),
            'jawaban': $(this).val()
        }
        // console.log(data);
        AjaxProsessDataPost('jawaban-pilihan-save', dataSet, function (data) {
            $('.number-load-class').load('ujian-siswa/number/' + ujianId, function () {
                $('.progress').hide();
            });
        });
    });
}
