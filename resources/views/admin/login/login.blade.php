<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/app.css">
    <title>{{ $title }}</title>
</head>

<body>
    <div class="row">
        <div class="col m6 offset-m3">
            <div class="card m12">
                <form action="#" class="card-content" name="form-login">
                    @include('admin.templates.preloader')
                    <span class="card-title">{{ $title }}</span>
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="email" id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="password" id="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="btn">Login</button>
                            <button type="button" class="btn">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="public/js/app.js"></script>
        <script src="public/assets/js/login.js"></script>
</body>

</html>