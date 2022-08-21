@extends("backend.shared.backend_theme")
@section("title","Users Module")
@section("subtitle","New Address")
@section("btn_url",url()->previous())
@section("btn_label","Turn Back")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/users/$user->user_id/addresses")}}" method="POST" autocomplete="off" novalidate>
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="City" placeholder="Enter City" field="city"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="District" placeholder="Enter District" field="district"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="zipcode" placeholder="Enter zipcode" field="zipcode"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="col-lg-6">
                    <x-checkbox field="is_default" label="Default Address"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-4">
                    <x-textarea label="details" placeholder="Enter Details" field="details"/>
                </div>
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
