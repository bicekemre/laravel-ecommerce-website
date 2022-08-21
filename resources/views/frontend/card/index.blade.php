<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basket</title>

    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Project</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Mainpage</a>
                            </li>
                            @auth()
                                <li class="nav-item">
                                    <a class="nav-link" href="/my-account">My Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/log-out">Log Out</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/log-in">Log In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/sign-up">Sign Up</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 pt-4">
            <h5>Hesabım</h5>
            <div class="list-group">
                <a href="/" class="list-group-item list-group-item-action">Basket</a>
            </div>
        </div>
        <div class="col-sm-9 pt-4">
            <h5>Basket</h5>
            @if(count($card->details) > 0)
                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Processes</th>
                    </thead>
                    <tbody>
                    @foreach($card->details as $detail)
                        <tr>
                            <td>
                                <img src="{{asset("/storage/products/".$detail->product->images[0]->image_url)}}"
                                     alt="{{$detail->product->images[0]->alt}}" width="100">
                            </td>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->product->price }}</td>
                            <td>
                                <a href="/basket/delete/{{$detail->card_detail_id}}">Out of basket</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="/buy" class="btn btn-success float-end">Buy</a>
            @else
                <p class="text-danger text-center">Basket is empty.</p>
            @endif
        </div>
    </div>
</div>
</body>
</html>
