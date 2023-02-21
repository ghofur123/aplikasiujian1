import $, {data} from 'jquery';
import {buttonDelete, buttonDeleteLoad} from './modul.ajax';
import {eventToast} from './modul.event';

export function deleteAll() {
    buttonDelete('lembaga-delete-btn', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('lembaga', function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
    buttonDelete('guru-delete-btn', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('guru', function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
    buttonDelete('jurusan-delete-btn', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('jurusan', function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
    buttonDelete('kelas-delete-btn', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('kelas', function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
    buttonDelete('tingkat-delete-btn', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('tingkat', function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
    buttonDelete('mapel-delete-btn', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('mapel', function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
    buttonDelete('siswa-delete-btn', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('siswa', function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
    buttonDelete('ujian-delete-btn', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('ujian', function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
    buttonDelete('bank-soal-pilihan-delete-btn', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('bank-soal-pilihan', function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
    buttonDeleteLoad('soal-delete-btn', function (data, loadPage) {
        if (data.success == true) {
            let dataMessageTrue = ['Berhasil di hapus'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load(loadPage, function () {
                $('.datatables-class').DataTable();
            });
        } else {}
    });
}
