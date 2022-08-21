@extends("backend.shared.backend_theme")
@section("title","Product Module")
@section("subtitle","Images")
@section("btn_url",url()->previous())
@section("btn_label","Turn Back")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/products/$product->product_id/images")}}" method="POST" autocomplete="off" novalidate
          enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Upload File" placeholder="" field="image_url" type="file"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Details" placeholder="Enter details" field="alt"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="No" placeholder="Enter image no" field="seq"/>
                </div>
            </div>
            <div class="col-lg-6">
                <x-checkbox field="is_active" label="Active"/>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> Save</button>
            </div>
        </div>
    </form>
@endsection
