@extends("backend.shared.backend_theme")
@section("title","Users Module")
@section("subtitle","Users")
@section("btn_url",url("/users/create"))
@section("btn_label","Add User")
@section("btn_icon","plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name Surname</th>
            <th scope="col">E-mail</th>
            <th scope="col">Status</th>
            <th scope="col">Processes</th>
        </tr>
        </thead>
        <tbody>
        @if(count($users) > 0)
            @foreach($users as $user)
                <tr {{$user->user_id}}>
                    <td>1</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->is_active == 1 )
                            <span class="badge text-bg-success">Active</span>
                        @else
                            <span class="badge text-bg-danger">Passive</span>
                        @endif
                    </td>


                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{url("/users/$user->user_id/edit")}}">
                                    <span data-feather="edit"></span>
                                    Update
                                </a>
                            </li>
                            <li class="nav-item text-black">
                                <a class="nav-link text-black"
                                   href="{{url("/users/$user->user_id/change-password")}}">
                                    <span data-feather="lock"></span>
                                    Change Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                   href="{{url("/users/$user->user_id/addresses")}}">
                                    <span data-feather="map-pin"></span>
                                    Address
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-black"
                                   href="{{url("/users/$user->user_id")}}">
                                    <span data-feather="trash-2"></span>
                                    delete
                                </a>
                            </li>
{{--                            <li class="nav-item text-black">--}}
{{--                                <form action="{{ route('users.destroy', [$user->user_id]) }}" method="POST">--}}
{{--                                    @csrf--}}

{{--                                    @method('DELETE')--}}

{{--                                    <button type="submit" class="btn btn-danger btn-block">Delete</button>--}}
{{--                                </form>--}}
{{--                            </li>--}}
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">
                    <p class="text-center">Users Not Found</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
