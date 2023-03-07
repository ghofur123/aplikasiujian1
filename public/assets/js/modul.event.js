import $ from 'jquery';

export function eventModal() {
    let elemsModal = document.querySelectorAll('.modal');
    let instancesModal = M.Modal.init(elemsModal);
}
export function eventSideNav() {
    let elemsSideNav = document.querySelectorAll('.sidenav');
    let instancesSideNav = M.Sidenav.init(elemsSideNav);
}
export function eventDropdown() {
    let elemsDropdown = document.querySelectorAll('.dropdown-trigger');
    let instancesDropdown = M.Dropdown.init(elemsDropdown);
}
export function eventSelect() {
    let elemsSelect = document.querySelectorAll('select');
    let instancesSelect = M.FormSelect.init(elemsSelect);
}
export function eventCkEditor(name) {
    for (let i = 0; i < name.length; i++) {
        CKEDITOR.replace(name[i], {
            filebrowserBrowseUrl: 'vendor/ckeditor/ckeditor/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&_token=' + $('meta[name="csrf-token"]').attr('content'),

            filebrowserImageBrowseUrl: 'vendor/ckeditor/ckeditor/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&_token=' + $('meta[name="csrf-token"]').attr('content'),

            filebrowserUploadUrl: 'vendor/ckeditor/ckeditor/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&_token=' + $('meta[name="csrf-token"]').attr('content'),

            filebrowserImageUploadUrl: "vendor/ckeditor/ckeditor/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&_token=" + $('meta[name=" csrf - token "]').attr('content')
        });
    }
}
export function eventCollapsible() {
    let elemscollapsible = document.querySelectorAll('.collapsible');
    let instancescollapsible = M.Collapsible.init(elemscollapsible);
}
export function eventClearCkEditor() {
    for (var instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].setData('');
    }
}
export function eventToast(data) {
    for (let i = 0; i < data.length; i++) {
        if (typeof data[i] != "undefined") {
            M.toast({html: data[i], classes: 'red darken-4'})
        }
    }
}
export function eventClearFormInput() {
    $('form input, form textarea, form select, form file, form radio').not('[name="_token"]').val('');
}
export function autoCompleteLembagaForm() {
    $('.autocomplete-class-load').load('component/form/ref/lembaga');
}
export function autoComplateRefJurusanForm() {
    $('.autocomplete-class-load-jur').load('component/form/ref/jurusan');
}
export function autoComplateMapelForm() {
    $('.autocomplete-class-load-mapel').load('component/form/ref/mapel');
}
export function clickCollectionOptionJur() {
    $(document).on('click', '.collection-option-jur', function () {
        $('.div-class-hidden').show();
        let idData = $(this).attr('data');
        let nameName = $(this).attr('data1');
        $('input[name="ref_jurusan_id"]').show().val(idData);
        $('input[name="ref_nama_jurusan"]').show().val(nameName);
        $('.autocomplete-collection-jur').hide();
    });
}
export function clickCollectionOptionMapel() {
    $(document).on('click', '.collection-option-mapel', function () {
        $('.div-class-hidden').show();
        let idData = $(this).attr('data');
        let nameName = $(this).attr('data1');
        $('input[name="mata_pelajaran_id"]').show().val(idData);
        $('input[name="nama"]').show().val(nameName);
        $('.autocomplete-collection-mapel').hide();
    });
}
export function actionShow(data) {
    for (let i = 0; i < data.length; i++) {
        $(data[i]).show();
    }
}
export function actionHide(data) {
    for (let i = 0; i < data.length; i++) {
        $(data[i]).hide();
    }
}
export function openFullscreen() {
    console.log('ok');
    var elem = document.documentElement;
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
    }
}

export function closeFullscreen() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
    }
}
export function eventKeyboard() {
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            e.preventDefault();
            var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) || (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) || (document.msFullscreenElement && document.msFullscreenElement !== null);

            if (! isInFullScreen) {
                openFullscreen();
            }
        }
    });
}
