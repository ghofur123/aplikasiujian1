<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="public/css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{ asset('vendor/ckeditor/ckeditor/ckeditor.js') }}"></script>
    <style>
        .tampil-nilai-class {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <title>ujian</title>
</head>

<body>
    @include('admin.templates.menu_left')
    @include('admin.templates.preloader')
    <div class="row content-load-class">
    </div>
    @include('admin.templates.modal')

    <script src="public/js/app.js"></script>
</body>

</html>