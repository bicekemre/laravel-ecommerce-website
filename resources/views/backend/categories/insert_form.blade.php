@extends("backend.shared.backend_theme")
@section("title","Category Module")
@section("subtitle","Add New Category")
@section("btn_url",url()->previous())
@section("btn_label","Turn Back")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/categories")}}" method="POST" autocomplete="off" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Category Name" placeholder="Enter Category Name" field="name"/>
                </div>
            </div>
            <div class="col-lg-6">
                <x-checkbox field="is_active" label="Active"/>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> Save
                </button>
            </div>
        </div>
    </form>
@endsection
