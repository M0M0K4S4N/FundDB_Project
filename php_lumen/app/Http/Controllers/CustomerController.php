<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function register()
    {

        return view('register.index', [
            'title' => 'Registration'
        ]);
    }
    public function store_register_data(Request $request)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $password = crypt($request->input('password'), config('user.password.salt'));
        //INSERT
        $customer = new Customer;
        $customer->name =$name;
        $customer->address = $address;
        $customer->password = $password;
        $customer->save();
        //end INSERT
        return view('register.index', [
            'title' => 'Registration'
        ]);
    }
}
