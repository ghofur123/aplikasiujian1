import $ from 'jquery';
import {clickCollectionOptionJur, clickCollectionOptionMapel, actionShow, actionHide} from './modul.event';

export function autoComplateLembaga(callback) {
    $(document).on('keyup', 'input[name="lembaga-search"]', function (e) {
        let actionShowClass = ['.progress', '.autocomplete-collection'];
        actionShow(actionShowClass);
        let search = $(this).val();
        var inputLength = search.length;
        if (inputLength < 3) {
            $('.autocomplete-collection').html('<li class="collection-item">Minimal 3 Huruf</li>');
            $('.progress').hide();
        } else {
            $.ajax({
                url: 'component/lembaga/' + search,
                type: 'GET',
                data: {},
                success: function (data) {
                    if (callback && typeof(callback) === "function") {
                        callback(data);
                    }
                    let actionHideClass = ['.progress'];
                    actionHide(actionHideClass);
                    $('.autocomplete-collection').html(data);
                }
            });
        }
        $(document).on('click', '.collection-option', function () {
            let idData = $(this).attr('data');
            let nameName = $(this).attr('data1');
            $('input[name="lembaga-search"]').val(nameName);
            $('input[name="lembaga_id"]').val(idData);
        });
    });
}
export function autoComplateRefJurusan(callback) {
    $(document).on('keyup', 'input[name="jurusan-search"]', function (e) {
        let actionHideClass1 = ['.div-class-hidden'];
        actionHide(actionHideClass1);
        let actionShowClass = ['.progress', '.autocomplete-collection'];
        actionShow(actionShowClass);
        let search = $(this).val();
        var inputLength = search.length;
        if (inputLength < 3) {
            $('.autocomplete-collection-jur').html('<li class="collection-item">Minimal 3 Huruf</li>');
            let actionHideClass2 = ['.progress'];
            actionHide(actionHideClass2);
        } else {
            $.ajax({
                url: 'component/jurusan/' + search,
                type: 'GET',
                data: {},
                success: function (data) {
                    if (callback && typeof(callback) === "function") {
                        callback(data);
                    }
                    let actionHideClass3 = ['.progress'];
                    actionHide(actionHideClass3);
                    $('.autocomplete-collection-jur').show();
                    $('.autocomplete-collection-jur').html(data);
                }
            });
        }
        clickCollectionOptionJur();
    });
}

export function autoComplateRefMapel(callback) {
    $(document).on('keyup', 'input[name="mapel-search"]', function (e) {
        let actionHideClass1 = ['.div-class-hidden'];
        actionHide(actionHideClass1);
        let actionShowClass = ['.progress', '.autocomplete-collection'];
        actionShow(actionShowClass);
        let search = $(this).val();
        var inputLength = search.length;
        if (inputLength < 3) {
            $('.autocomplete-collection-mapel').html('<li class="collection-item">Minimal 3 Huruf</li>');
            let actionHideClass2 = ['.progress'];
            actionHide(actionHideClass2);
        } else {
            $.ajax({
                url: 'component/mapel/' + search,
                type: 'GET',
                data: {},
                success: function (data) {
                    if (callback && typeof(callback) === "function") {
                        callback(data);
                    }
                    let actionHideClass3 = ['.progress'];
                    actionHide(actionHideClass3);
                    $('.autocomplete-collection-mapel').show();
                    $('.autocomplete-collection-mapel').html(data);
                }
            });
        }
        clickCollectionOptionMapel();
    });
}
