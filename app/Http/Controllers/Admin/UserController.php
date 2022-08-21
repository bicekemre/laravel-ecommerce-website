<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Http\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{

    public function __construct()
    {
         $this->returnUrl = "/users";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $users  =   User::all();
        return view("backend.users.index", ["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return view("backend.users.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return
     */
    public function store(\App\Http\Requests\UserRequest $request)
    {
        $user = new User();
        $data = $this->prepare($request, $user->getFillable());
        $user->fill($data);
        $user->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(User $user): View
    {
        return view("backend.users.update_form", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return
     */
    public function update(\App\Http\Requests\UserRequest $request, User $user)
    {
        $data = $this->prepare($request, $user->getFillable());
        $user->fill($data);
        $user->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy(User $user)
    {
        $user->delete();
        return header("Refresh:0; url=page2.php");
//        return Redirect::to("/users");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function passwordForm(User $user): View
    {
        return view("backend.users.password_form", ["user" => $user]);
    }

    public function changePassword(User $user, \App\Http\Requests\UserRequest $request)
    {
        $data = $this->prepare($request, $user->getFillable());
        $user->fill($data);
        $user->save();
        return redirect($this->returnUrl);
    }
}
