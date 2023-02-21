import $, {data} from 'jquery';
import {submitUploadFile} from './modul.ajax';
import {eventToast, eventClearFormInput} from './modul.event';

export function uplodaFileAll() {
    submitUploadFile('guru-form-excel', 'guru-import-excel', function (data) {
        let dataMessage = [data.message];
        eventToast(dataMessage);
        eventClearFormInput();
        $('.content-load-class').load('guru', function () {
            $('.datatables-class').DataTable();
        });
    });
    submitUploadFile('siswa-form-excel', 'siswa-import-excel', function (data) {
        let dataMessage = [data.message];
        eventToast(dataMessage);
        eventClearFormInput();
        $('.content-load-class').load('siswa', function () {
            $('.datatables-class').DataTable();
        });
    });
    submitUploadFile('soal-form-excel', 'soal-import/import/excel', function (data) {
        let dataMessage = [data.message];
        eventToast(dataMessage);
        eventClearFormInput();
        $('.content-load-class').load('soal/index/' + data.bank_soal_pilihan_id_encrypt, function () {
            $('.datatables-class').DataTable();
        });
    });

}
