@extends("backend.shared.backend_theme")
@section("title","Users Module")
@section("subtitle","Change Password")
@section("btn_url",url()->previous())
@section("btn_label","Turn Back")
@section("btn_icon","arrow-left")
@section("content")
    <?php ?>
    <form action="{{url("/users/$user->user_id/change-password")}}" method="POST" autocomplete="off" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <input label="Enter Password" placeholder="Enter Password" field="password" type="password"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <input label="Again Enter Password" placeholder="Again Enter Password" field="password_confirmation"
                             type="password"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> SAVE
                </button>
            </div>
        </div>
    </form>
@endsection
