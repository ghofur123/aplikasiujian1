import $, {data} from 'jquery';
import 'datatables.net';
import 'materialize-css';
$.extend($.fn.dataTable.ext.classes, {
    "sPageButton": "btn waves-effect",
    "sFilterInput": "validate s6"
});

import {
    eventModal,
    eventSideNav,
    eventDropdown,
    eventSelect,
    eventToast,
    eventClearFormInput,
    eventCkEditor,
    eventCollapsible,
    autoCompleteLembagaForm,
    autoComplateRefJurusanForm,
    autoComplateMapelForm
} from './modul.event';

import {insertDataAll} from './insert';
import {updateDataAll} from './update';
import {uplodaFileAll} from './upload.file';
import {deleteAll} from './delete';
import {loginForm} from './login';
import {viewAll} from './view.data';
import {prosesComplex} from './proses.complex';

import {autoComplateLembaga, autoComplateRefJurusan, autoComplateRefMapel} from './autocomplete';


document.addEventListener('DOMContentLoaded', function () {
    eventSideNav();
    eventModal();
});

$(document).on('DOMContentLoaded', function () {});
$(document).on('click', '.menu-item', function () {
    $('.progress').show();
    let link = $(this).attr('link');
    $('.content-load-class').load(link, function () {
        $('.progress').hide();
        eventModal();
        eventDropdown();
        // mengambil link
        let resLinkOne = link.split("/")[0];
        let resLink = link.split("/")[0] + "/" + link.split("/")[1];

        console.log(resLinkOne);

        if (resLink == 'soal/index' || resLinkOne == 'ujian-siswa') {
            $('.datatables-class').DataTable({scrollX: true});
        } else if (resLinkOne == 'pilih-soal') {
            eventCollapsible();
        } else if (resLinkOne == 'soal') {
            //
            // jika ke menu soal maka akan membuka ckeditor dan colapsible
            let dataCkEditor = [
                'soal',
                'a',
                'b',
                'c',
                'd',
                'e',
                'pembahasan'
            ];
            eventCkEditor(dataCkEditor);
            eventCollapsible();
        } else {
            $('.datatables-class').DataTable();
        }

    });
});
$(document).on('click', '.btn-modal-class', function () {
    $('.progress').show();
    let link = $(this).attr('link');
    $('.modal-content-class').load(link, function () {
        eventSelect();
        $('.progress').hide();
        autoCompleteLembagaForm();
        autoComplateRefJurusanForm();
        autoComplateMapelForm();
    });
});

insertDataAll();
updateDataAll();
uplodaFileAll();
deleteAll();
autoComplateLembaga(function () {});
autoComplateRefJurusan(function () {});
autoComplateRefMapel(function () {});
loginForm();
viewAll();
prosesComplex();
