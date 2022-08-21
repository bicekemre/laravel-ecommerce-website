@extends("backend.shared.backend_theme")
@section("title","Product Module")
@section("subtitle","Add New Product")
@section("btn_url",url()->previous())
@section("btn_label","Turn Back")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/products/$product->product_id")}}" method="POST" autocomplete="off" novalidate>
        @csrf
        @method("PUT")
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Product Name" placeholder="Enter Product Name" field="name" value="{{$product->name}}"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <label for="category_id" class="form-label">Choice Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="-1">Choice</option>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->category_id}}" {{$product->category_id == $category->category_id ? "selected" : ""}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error("category_id")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Price" placeholder="Enter Price" field="price" value="{{$product->price}}"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Old Price" placeholder="Enter Old Price" field="old_price"
                             value="{{$product->old_price}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-2">
                    <x-input label="Product Details" placeholder="Enter Product Details" field="lead"
                             value="{{$product->lead}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-2">
                    <x-textarea label="Product Definition" placeholder="Enter Product Definition" field="description"
                                value="{{$product->description}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-checkbox field="is_active" label="Active" checked="{{$product->is_active == 1}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> Save</button>
            </div>
        </div>
    </form>
@endsection
