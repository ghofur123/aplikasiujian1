import $, {data} from 'jquery';
import {submitFormText} from './modul.ajax';
export function loginForm() {
    submitFormText('form-login', 'login', function (data) {
        if (data.success == true) {
            eventToast("Login Berhasil");
            setTimeout(window.location.href = "./", 300);
        } else {
            eventToast(data.message);
        }
    });
}
