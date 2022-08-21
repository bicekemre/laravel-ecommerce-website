<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş Yapın</title>

    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
            <main class="mt-5">
                <form method="POST" action="{{url("/log-in")}}">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Log in</h1>

                    <div class="form-group mt-2">
                        <x-input label="Enter E-mail" placeholder="Enter E-mail" field="email" type="email"/>
                    </div>

                    <div class="form-group mt-2">
                        <x-input label="Enter Password" placeholder="Enter Password" field="password" type="password"/>
                    </div>

                    <div class="form-group  mb-3 mt-2">
                        <x-checkbox field="remember-me" label="Remember me"/>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
                </form>
            </main>
        </div>
    </div>
</div>
</body>
</html>
