@extends("backend.shared.backend_theme")
@section("title","Product Module")
@section("subtitle","Products")
@section("btn_url",url("/products/create"))
@section("btn_label","Add Product")
@section("btn_icon","plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Old Price</th>
            <th scope="col">Status</th>
            <th scope="col">Processes</th>
        </tr>
        </thead>
        <tbody>
        @if(count($products) > 0)
            @foreach($products as $product)
                <tr id="{{$product->product_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->old_price}}</td>
                    <td>
                        @if($product->is_active == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Passive</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{url("/products/$product->product_id/edit")}}">
                                    <span data-feather="edit"></span>
                                    Update
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-black"
                                   href="{{url("/products/$product->product_id")}}">
                                    <span data-feather="trash-2"></span>
                                    Delete
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                   href="{{url("/products/$product->product_id/images")}}">
                                    <span data-feather="image"></span>
                                    Images
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">
                    <p class="text-center">No records found.</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
