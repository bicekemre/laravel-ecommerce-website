@extends("backend.shared.backend_theme")
@section("title","Users Address Module")
@section("subtitle","Update Address")
@section("btn_url",url()->previous())
@section("btn_label","Turn Back")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/users/$address->user_id/addresses/$address->id")}}" method="POST" autocomplete="off" novalidate>
        @csrf
        @method("GET")
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <input type="hidden" name="user_id" value="{{$address->id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="City" placeholder="Enter City" field="city" value="{{$address->city}}"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="District" placeholder="Enter District" field="district" value="{{$address->district}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Zipcode" placeholder="Enter Zipcode" field="zipcode"
                             value="{{$address->zipcode}}"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="col-lg-6">
                    <x-checkbox field="is_default" label="Default" checked="{{$address->is_default == 1}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-4">
                    <x-textarea label="Details" placeholder="Enter Details" field="details"
                                value="{{$address->address}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> Save</button>
            </div>
        </div>
    </form>
@endsection
