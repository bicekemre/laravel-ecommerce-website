@extends("backend.shared.backend_theme")
@section("title","Users Address Module")
@section("subtitle","Addresses")
@section("btn_url",url("/users/$user->user_id/addresses/create"))
@section("btn_label","Add Address")
@section("btn_icon","plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">City</th>
            <th scope="col">District</th>
            <th scope="col">Post Code</th>
            <th scope="col">Details</th>
            <th scope="col">Default Address</th>
            <th scope="col">Processes</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($addresses) == true)
            @foreach($addresses as $address)
                <tr {{$address->id}}>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$address->city}}</td>
                    <td>{{$address->district}}</td>
                    <td>{{$address->zipcode}}</td>
                    <td>{{$address->address}}</td>
                    <td>
                        @if($address->is_default == 1)
                            <span class="badge text-bg-success">Default</span>
                        @else
                            <span class="badge text-bg-danger">None Default</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{url("/users/$user->user_id/addresses/$address->id/edit")}}">
                                    <span data-feather="edit"></span>
                                    Update
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-danger"
                                   href="{{url("/users/$user->user_id/addresses/$address->id")}}">
                                    <span data-feather="trash-2"></span>
                                    Delete
                                </a>
                            </li>
                            <li class="nav-item text-black">
                                <form action="{{ route('addresses.destroy', [$user->user_id , $address->id]) }}" method="POST">
                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">
                    <p class="text-center">Addresses Not Found</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
