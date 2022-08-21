<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Error</title>

    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
            <main class="mt-5">
                <h1>Payment Error</h1>
                <p>An error was encountered in the payment transaction.</p>
                <p>Please check the information you entered and your card limit.</p>
                <p><strong>Error:</strong> <span class="text-black">{{$message}}</span></p>
            </main>
        </div>
    </div>
</div>
</body>
</html>
