@extends("backend.shared.backend_theme")
@section("title","Category Module")
@section("subtitle","Update Category")
@section("btn_url",url()->previous())
@section("btn_label","Turn Back")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/categories/$category->category_id")}}" method="POST" autocomplete="off" novalidate>
        @csrf
        @method("PUT")
        <input type="hidden" name="category_id" value="{{$category->category_id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Category Name" placeholder="Enter Category Name" field="name"
                             value="{{$category->name}}"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Slug" placeholder="Ente Slug" field="slug" value="{{$category->slug}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <x-checkbox field="is_active" label="Active" checked="{{$category->is_active == 1}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> KAYDET</button>
            </div>
        </div>
    </form>
@endsection
