@extends("backend.shared.backend_theme")
@section("title","Category Module")
@section("subtitle","Categories")
@section("btn_url",url("/categories/create"))
@section("btn_label","Add Category")
@section("btn_icon","plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Status</th>
            <th scope="col">Processes</th>
        </tr>
        </thead>
        <tbody>
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <tr id="{{$category->category_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        @if($category->is_active == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Pasive</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                   href="{{url("/categories/$category->category_id/edit")}}">
                                    <span data-feather="edit"></span>
                                    Update
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-black"
                                   href="{{url("/categories/$category->category_id")}}">
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
                    <p class="text-center">Category Not Found.</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
