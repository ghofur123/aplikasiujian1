import $, {data} from 'jquery';
import {AjaxProsessData} from './modul.ajax';

export function prosesComplex() {
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
        }
    });
}
