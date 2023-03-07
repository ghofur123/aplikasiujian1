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
        let resLink = link.split("/")[0] + "/" + link.split("/")[1];
        if (resLink == 'soal/index') {
            $('.datatables-class').DataTable({scrollX: true});
        } else {
            $('.datatables-class').DataTable();
        }
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
$(document).on('click', '.collapsible-click-class', function () {
    $('.progress').show();
    let bankSoalId = $(this).attr('data');
    let idDiv = $(this).attr('data1');
    $('#collapsible-id-' + idDiv).load('view-soal-in-ujian/' + bankSoalId, function () {
        $('.progress').hide();
    });
});
$(document).on('change', 'select[name="pilih-role"]', function () {
    let valueData = $(this).val();
    console.log(valueData);
});
