@extends("backend.shared.backend_theme")
@section("title","Product Module")
@section("subtitle","Images")
@section("btn_url",url("/products/$product->product_id/images/create"))
@section("btn_label","Add New")
@section("btn_icon","plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Image</th>
            <th scope="col">Details</th>
            <th scope="col">Status</th>
            <th scope="col">Processes</th>
        </tr>
        </thead>
        <tbody>
        @if(count($product->images) > 0)
            @foreach($product->images as $image)
                <tr id="{{$image->image_id}}">
                    <td>{{$image->seq}}</td>
                    <td>
                        @if(Str::of($image->image_url)->isNotEmpty())
                            <img src="{{asset("/storage/products/$image->image_url/images")}}"
                                 alt="{{$image->alt}}"
                                 class="img-thumbnail"
                                 width="80">
                        @endif
                    </td>
                    <td>{{$image->alt}}</td>
                    <td>
                        @if($image->is_active == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Passive</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                   href="{{url("/products/$product->product_id/images/$image->image_id/edit")}}">
                                    <span data-feather="edit"></span>
                                    Update
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-black"
                                   href="{{url("/products/$product->product_id/images/$image->image_id")}}">
                                    <span data-feather="trash-2"></span>
                                    Delete
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">
                    <p class="text-center">No records found.</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
