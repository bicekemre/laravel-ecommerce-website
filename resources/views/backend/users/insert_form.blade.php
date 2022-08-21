@extends("backend.shared.backend_theme")
@section("title","Users Module")
@section("subtitle","New User")
@section("btn_url",url()->previous())
@section("btn_label","Turn Back")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/users")}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <label for="name" class="form-label">Name & Surname</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}" placeholder="Enter name and surname">
                @error("name")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter E-mail">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                @error("password")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="password_confirmation" class="form-label">Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter password again">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox"  id="is_admin" name="is_admin" value="1">
                    <label class="form-check-label" for="is_admin">
                        Authorized user
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox"  id="is_active" name="is_active" value="1">
                    <label class="form-check-label" for="is_active">
                        Active
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success mt-2">SAVE</button>
            </div>
        </div>
    </form>
@endsection
