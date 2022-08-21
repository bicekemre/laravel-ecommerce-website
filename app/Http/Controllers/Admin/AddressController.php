<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PHPUnit\Framework\Constraint\DirectoryExists;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->returnUrl= "/users/{}/addresses";
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(User $user): View
    {
        $addresses = $user->addresses;
        return view("backend.addresses.index", ["addresses" => $addresses, "user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(User $user): View
    {
        return view("backend.addresses.insert_form", ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, AddressRequest $request)
    {
        $address = new Address();
        $data = $this->prepare($request, $address->getFillable());
        $address->fill($data);
        $address->save();

        return Redirect::to($this->returnUrl);
    }

    private function editReturnUrl($id)
    {
        $this->returnUrl = "/users/$id/addresses";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param Address $address
     * @return View
     */
    public function edit(User $user, Address $address): View
    {
        return view("backend.addresses.update_form", ["user" => $user, "address" => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(AddressRequest $request, User $user, Address $address): RedirectResponse
    {
        $data = $this->prepare($request, $address->getFillable());
        $address->fill($data);
        $address->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @return View
     */
    public function destroy(User $user, Address $address) : View
    {
        $address->user_id->is($user);

        $address->delete();

        return Redirect::to($this->returnUrl);
    }


}
