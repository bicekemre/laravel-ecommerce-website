@extends("backend.shared.backend_theme")
@section("title","Users Module")
@section("subtitle","Update User")
@section("btn_url",url()->previous())
@section("btn_label","Turn Back")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{route('users.update', [$user->user_id])}}" method="POST" autocomplete="off" novalidate>
        @csrf
        @method("PUT")
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Name & Surname" placeholder="Enter Name & Surname" field="name" value="{{$user->name}}"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="E-mail" placeholder="Enter E-mail" field="email" type="email"
                             value="{{$user->email}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-checkbox field="is_admin" label="Authorized user" checked="{{$user->is_admin == 1}}"/>
            </div>
            <div class="col-lg-6">
                <x-checkbox field="is_active" label="Active" checked="{{$user->is_active == 1}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> Save</button>
            </div>
        </div>
    </form>
@endsection
