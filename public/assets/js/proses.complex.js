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
        let waktuUjian = $(this).attr('data1');
        console.log(waktuUjian);
        if (confirm('Akan memulai ujian...?')) { // openFullscreen();
            $('.progress').show();
            $('.content-load-class').load('ujian-siswa/mulai', function () { // console.log('ujian-siswa/number/' + idUjian);
                $('.number-load-class').load('ujian-siswa/number/' + idUjian, function () {
                    $('.progress').hide();
                });

                // membuat hitung mundur sesuai dengan waktu yang di tentukan
                let count = localStorage.getItem("countdown") || 60 * waktuUjian; // waktu dalam menit x 60 detik
                let timer = setInterval(function () {
                    count--;
                    localStorage.setItem("countdown", count);
                    let minutes = Math.floor(count / 60);
                    let seconds = count % 60;
                    let time = minutes + ":" + (
                    seconds < 10 ? "0" : ""
                ) + seconds;
                    $("#countdown").html("Waktu Tersisa: " + time);
                    if (count == 0) {
                        clearInterval(timer);
                        alert("Waktu ujian telah berakhir!");
                        localStorage.removeItem("countdown");
                        // tambahkan kode untuk mengumpulkan jawaban atau mengakhiri ujian di sini

                        // post status ujian
                        let dataValue = {
                            'ujian_id': idUjian,
                            'status': 'selesai'
                        }
                        AjaxProsessDataPost('status-ujian-siswa', dataValue, function (data) { // menghilangkan nomer
                            if (data.success == true) { // menghilankan nomer ujian
                                $('.number-exam-class').hide();
                            }
                        });
                    }
                }, 1000); // 1000 milidetik = 1 detik

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
    $(document).on('click', '.selesaikan-ujian', function () { // post status ujian
        if (confirm('Ingin Menyelesaikan ujaian')) {
            let idUjian = $(this).attr('data');
            let dataValue = {
                'ujian_id': idUjian,
                'status': 'selesai'
            }
            AjaxProsessDataPost('status-ujian-siswa', dataValue, function (data) { // menghilangkan nomer
                if (data.success == true) { // menghilankan nomer ujian
                    $('.number-exam-class').hide();
                }
            });
        }
    });
}
