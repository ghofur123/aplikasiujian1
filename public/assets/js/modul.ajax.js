import $ from 'jquery';
import {actionShow, actionHide} from './modul.event';

export function submitFormText(name, linkPost, callback) {
    $(document).on('submit', 'form[name="' + name + '"]', function (e) {
        e.preventDefault();

        let actionShowClass = ['.progress'];
        actionShow(actionShowClass);

        let hasBeenProcessed = false;

        $.ajax({
            type: 'POST',
            url: linkPost,
            data: $(this).serialize(),
            beforeSend: function () {
                //
                // memastikan hanya proses 1 x
                if (! hasBeenProcessed) {
                    hasBeenProcessed = true;
                    return true;
                } else {
                    return false;
                }
            },
            success: function (data) {
                if (callback && typeof(callback) === "function") {
                    callback(data);
                }
                let actionHideClass = ['.progress'];
                actionHide(actionHideClass);
            }
        }).done(function () {});
        return false;
    });
}
export function submitUploadFile(name, linkPost, callback) {
    $(document).on('submit', 'form[name="' + name + '"]', function (e) {
        e.preventDefault();
        let actionShowClass = ['.progress'];
        actionShow(actionShowClass);
        let hasBeenProcessed = false;
        let formData = new FormData(this);
        $.ajax({
            url: linkPost,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                //
                // memastikan hanya proses 1 x
                if (! hasBeenProcessed) {
                    hasBeenProcessed = true;
                    return true;
                } else {
                    return false;
                }
            },
            success: function (data) {
                if (callback && typeof(callback) === "function") {
                    callback(data);
                }
                let actionHideClass = ['.progress'];
                actionHide(actionHideClass);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
}

export function submitFormPut(name, link, callback) {
    $(document).on('submit', 'form[name="' + name + '"]', function (e) {
        e.preventDefault();
        let actionShowClass = ['.progress'];
        actionShow(actionShowClass);
        $.ajax({
            url: link,
            type: 'PUT',
            data: $(this).serialize(),
            success: function (data) {
                if (callback && typeof(callback) === "function") {
                    callback(data);
                }
                let actionHideClass = ['.progress'];
                actionHide(actionHideClass);
            }
        });
        return false;
    });
}
export function buttonDelete(name, callback) {
    $(document).on('click', 'button[name="' + name + '"]', function (e) {
        e.stopPropagation();
        if (confirm('data akan di hapus?')) {
            e.preventDefault();
            let actionShowClass = ['.progress'];
            actionShow(actionShowClass);
            let id = $(this).attr('data');
            let link = $(this).attr('link');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: link,
                type: 'delete',
                data: {
                    'id': id
                },
                success: function (data) {
                    if (callback && typeof(callback) === "function") {
                        callback(data);
                        let actionHideClass = ['.progress'];
                        actionHide(actionHideClass);
                    }
                }
            });
        }
    });
}
export function buttonDeleteLoad(name, callback) {
    $(document).on('click', 'button[name="' + name + '"]', function (e) {
        e.stopPropagation();
        let loadPage = $(this).attr('data1');
        if (confirm('data akan di hapus?')) {
            e.preventDefault();
            let actionShowClass = ['.progress'];
            actionShow(actionShowClass);
            let id = $(this).attr('data');
            let link = $(this).attr('link');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: link,
                type: 'delete',
                data: {
                    'id': id
                },
                success: function (data) {
                    if (callback && typeof(callback) === "function") {
                        callback(data, loadPage);
                        let actionHideClass = ['.progress'];
                        actionHide(actionHideClass);
                    }
                }
            });
        }
    });
}

export function submitFormCkEditor(name, link, method, callback) {
    $(document).on('submit', 'form[name="' + name + '"]', function () {
        let actionShowClass = ['.progress'];
        actionShow(actionShowClass);
        $.ajax({
            url: link,
            type: method,
            data: $(this).serialize(),
            success: function (data) {
                if (callback && typeof(callback) === "function") {
                    callback(data);
                    let actionHideClass = ['.progress'];
                    actionHide(actionHideClass);
                }
            }
        });
        return false;
    });
}
