<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Promotion;
class CustomerController extends Controller
{

    public function login()
    {
      return view('customer.login', [
          'title' => 'Customer Login'
      ]);
    }

    public function login_authen(Request $request)
    {
      $request->session()->put('key', 'value');

      echo $request->session()->get('key');
      echo $request->input('accountNum');
      echo $request->input('passwd');
    }

    public function register()
    {

        return view('customer.register.index', [
            'title' => 'Registration'
        ]);
    }
    public function store_register_data(Request $request)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $password = crypt($request->input('password'), env('USER_PASSWORD_SALT'));
        //INSERT
        $customer = new Customer;
        $customer->name =$name;
        $customer->address = $address;
        $customer->password = $password;
        $customer->save();
        //end INSERT

        return view('customer.register.success', [
            'title' => 'Register Success',
            'show' => $customer
        ]);
    }

    public function view_register_data()
    {
        $customers = Customer::all();
        //echo $customers;
        return view('customer.register.view', [
          'title' => 'View',
          'customers' => $customers
        ]);
    }

    public function delete_register_data(Request $request)
    {

        //echo $request->id;
        $customer = Customer::find($request->id);
        //echo $customer->id;
        $customer->delete();

        //$customers = Customer::all();
        //echo $customers;
        $customers = Customer::all();
        //echo $customers;
        return view('customer.register.view', [
          'title' => 'View',
          'customers' => $customers
        ]);
    }

    public function guest_view_menu()
    {
        $foods = Food::all();
        return view('customer.guest_menu', [
          'title' => 'Menu',
          'foods' => $foods
        ]);
    }

    public function guest_view_promotion()
    {
        $promotions = Promotion::all();
        return view('customer.guest_promotion', [
          'title' => 'Menu',
          'promotions' => $promotions
        ]);
    }


}
