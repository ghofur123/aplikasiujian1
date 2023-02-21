import $, {data} from 'jquery';
import {submitFormText, submitFormCkEditor} from './modul.ajax';
import {eventToast, eventClearFormInput, eventClearCkEditor} from './modul.event';


export function insertDataAll() {
    submitFormText('lembaga-form', 'lembaga', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('lembaga', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.npsn, data.message.nama_lembaga, data.message.alamat]
            eventToast(dataMessage);
        }
    });
    submitFormText('guru-form', 'guru', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('guru', function () {
                $('.datatables-class').DataTable();
            });
        } else {

            let dataMessage = [
                data.message.nip,
                data.message.nama,
                data.message.jkl,
                data.message.agama,
                data.message.tlp,
                data.message.npsn
            ];
            eventToast(dataMessage);
        }
    });
    submitFormText('jurusan-form', 'jurusan', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('jurusan', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.ref_jurusan_id, data.message.ref_nama_jurusan, data.message.lembaga_id];
            eventToast(dataMessage);
        }
    });
    submitFormText('kelas-form', 'kelas', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('kelas', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.nama_kelas, data.message.jurusan_id, data.message.wali_kelas_id];
            eventToast(dataMessage);
        }
    });
    submitFormText('tingkat-form', 'tingkat', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('tingkat', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.kode, data.message.limit_pilihan, data.message.npsn];
            eventToast(dataMessage);
        }
    });
    submitFormText('mapel-form', 'mapel', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('mapel', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.mata_pelajaran_id, data.message.nama, data.message.kelas_id];
            eventToast(dataMessage);
        }
    });
    submitFormText('siswa-form', 'siswa', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('siswa', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.nisn, data.message.nik, data.message.nama, data.message.kelas_id];
            eventToast(dataMessage);
        }
    });
    submitFormText('ujian-form', 'ujian', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('ujian', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [
                data.message.nama_ujian,
                data.message.kelas_id,
                data.message.jumlah_soal,
                data.message.waktu,
                data.message.tingkat_id,
                data.message.mapel_id,
                data.message.status,
                data.message.metode
            ];
            eventToast(dataMessage);
        }
    });
    submitFormText('bank-soal-pilihan-form', 'bank-soal-pilihan', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('bank-soal-pilihan', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.nama, data.message.mapel_id];
            eventToast(dataMessage);
        }
    });
    submitFormCkEditor('soal-form', 'soal', 'POST', function (data) {
        if (data.success == true) {
            eventClearFormInput();
            eventClearCkEditor();
            let dataMessageTrue = ['data berhasi di simpan'];
            eventToast(dataMessageTrue);
        } else {
            let dataMessage = [
                data.message.soal,
                data.message.a,
                data.message.b,
                data.message.c,
                data.message.d,
                data.message.e,
                data.message.jawaban,
                data.message.pembahasan,
                data.message.bank_soal_pilihan_id
            ];
            eventToast(dataMessage);
        }
    });
}
