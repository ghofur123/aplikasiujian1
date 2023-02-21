import $, {data} from 'jquery';
import {submitFormPut, submitFormCkEditor} from './modul.ajax';
import {eventToast, eventClearFormInput} from './modul.event';

export function updateDataAll() {
    submitFormPut('lembaga-edit', 'lembaga', function (data) {
        if (data.success == true) {
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
    submitFormPut('guru-form-edit', 'guru', function (data) {
        if (data.success == true) {
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
    submitFormPut('jurusan-form-edit', 'jurusan', function (data) {
        if (data.success == true) {
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
    submitFormPut('kelas-form-edit', 'kelas', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['data berhasi di ubah'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('kelas', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.nama_kelas, data.message.jurusan_id, data.message.wali_kelas_id];
            eventToast(dataMessage);
        }
    });
    submitFormPut('tingkat-form-edit', 'tingkat', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['data berhasi di ubah'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('tingkat', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.tingkat_lembaga, data.message.limit_pilihan, data.message.lembaga_id];
            eventToast(dataMessage);
        }
    });
    submitFormPut('mapel-form-edit', 'mapel', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['data berhasi di ubah'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('mapel', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.mata_pelajaran_id, data.message.nama, data.message.kelas_id];
            eventToast(dataMessage);
        }
    });
    submitFormPut('siswa-form-edit', 'siswa', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['data berhasi di ubah'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('siswa', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.message.nisn, data.message.nik, data.message.nama, data.message.kelas_id];
            eventToast(dataMessage);
        }
    });
    submitFormPut('ujian-form-edit', 'ujian', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['data berhasi di ubah'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('ujian', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [
                data.nama_ujian,
                data.kelas_id,
                data.jumlah_soal,
                data.waktu,
                data.tingkat_id,
                data.mapel_id,
                data.status,
                data.metode
            ];
            eventToast(dataMessage);
        }
    });
    submitFormPut('bank-soal-pilihan-form-edit', 'bank-soal-pilihan', function (data) {
        if (data.success == true) {
            let dataMessageTrue = ['data berhasi di ubah'];
            eventToast(dataMessageTrue);
            $('.content-load-class').load('bank-soal-pilihan', function () {
                $('.datatables-class').DataTable();
            });
        } else {
            let dataMessage = [data.nama, data.mapel_id];
            eventToast(dataMessage);
        }
    });
    submitFormCkEditor('soal-form-edit', 'soal', 'PUT', function (data) {
        if (data.success == true) {
            // eventClearFormInput();
            // eventClearCkEditor();
            let dataMessageTrue = ['data berhasi di ubah'];
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
