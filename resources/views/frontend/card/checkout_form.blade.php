<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
            <main class="mt-5">
                <form method="POST" action="{{url("/buy")}}">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Card Information</h1>

                    <div class="form-group mt-2">
                        <x-input label="Name & Surname" placeholder="Enter Name & Surname on card" field="name"/>
                    </div>

                    <div class="form-group mt-2">
                        <x-input label="Card NO" placeholder="Enter Card NO" field="card_no"/>
                    </div>

                    <div class="form-group mt-2">
                        <x-input label="Expiration Date Month" placeholder="Enter Expiration Date Month" field="expire_month"
                                 type="number"/>
                    </div>

                    <div class="form-group mt-2">
                        <x-input label="Expiration Date Year" placeholder="Enter Expiration Date Year" field="expire_year"
                                 type="number"/>
                    </div>

                    <div class="form-group mt-2">
                        <x-input label="Cvc" placeholder="Enter Cvc code" field="cvc" type="number"/>
                    </div>

                    <button class="w-100 btn btn-lg btn-success mt-4" type="submit">Buy</button>
                </form>
            </main>
        </div>
    </div>
</div>
</body>
</html>
