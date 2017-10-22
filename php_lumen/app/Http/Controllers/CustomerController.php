<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Promotion;
use App\Models\Order;
use App\Models\Orderfoodlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    private function get_user($key)
    {
      $out = Customer:: where('api_token', '=', $key)->first();
      return $out;
    }

    public function login(Request $request)
    {

      if($request->session()->has('token'))
      {
        return redirect('/customer/menu');
      }
      return view('customer.login', [
          'title' => 'Customer Login'
      ]);
    }

    public function login_authen(Request $request)
    {
       if ($request->has('accountNum') && $request->has('passwd'))
       {
         $customer = Customer::where('id', $request->input('accountNum'))
                               ->where('password', crypt($request->input('passwd'), env('USER_PASSWORD_SALT')))
                               ->first();
         if ($customer)
         {
           $token=str_random(60);
           $customer->api_token=$token;
           $customer->save();
           $request->session()->put('token',$token);
           //return $this->view_menu($request);
           return redirect('/customer/menu');
         }
         else{
           return redirect('/login');
         }
     }
    }
    public function logout(Request $request)
    {
     if($request->session()->has('token'))
     {
       echo $request->session()->get('token');

       $user = $this->get_user($request->session()->get('token'));
      if($user)
      {
        $user->api_token=str_random(30);
        $user->save();
      }
     $request->session()->forget('token');


     }
     $request->session()->forget('token');
     return redirect('/login');
   }

    public function view_menu(Request $request)
    {
     if($request->session()->has('token'))
     {
       $foods = Food::all();
       $user = $this->get_user($request->session()->get('token'));
       if(!$user)
       {
         return redirect('/logout');
       }
       return view('customer.menu', [
               'title' => 'Menu',
               'foods' => $foods,
               'user'  => $user
               ]);
     }
      return redirect('/menu');

    }

    public function place_order(Request $request)
    {
      if($request->session()->has('token'))
      {
        $foods = $request->input('food');
        $qty = $request->input('qty');
        $detail = $request->input('detail');
        $user = $this->get_user($request->session()->get('token'));
        if(!$user)
        {
          return redirect('/logout');
        }
        $newOrder = new Order;
        $newOrder->customer_id = $user->id;
        $newOrder->delivery_flag = 0; ###temp
        $newOrder->detail = $detail;
        $newOrder->order_time = Carbon::now();
        $newOrder->save();
        foreach ($foods as $food)
        {
          $newFood = new Orderfoodlist;
          $newFood->order_id = $newOrder->id;
          $newFood->food_id = $food;
          $newFood->Qty = $qty[$food-1];
          $newFood->cook_by = null;
          $newFood->cooking_flag = 0;
          $newFood->serve_flag = 0;
          $newFood->isPaid = 0;
          $newFood->save();
        }
        //echo 'yey!';
        return redirect('/customer/queue');
      }

    }

    private function get_waiting_queue($first_id)
    {
      $list  = Orderfoodlist::all();
      $count = 0;
      foreach ($list as $elem)
      {
        if($elem->id == $first_id)
        {
          break;
        }
        $count++;
      }
      return $count;
    }

    public function view_order(Request $request)
    {
      if(!$request->session()->has('token'))
      {
        return redirect('/login');
      }
      $user = $this->get_user($request->session()->get('token'));
      if(!$user)
      {
        return redirect('/logout');
      }
      $customerOrders = DB::table('orderfoodlists')
                          ->join('orders','order_id','=','orders.id')
                          ->join('foods','food_id','=','foods.id')
                          ->where('orders.customer_id','=',$user->id)
                          ->where('orderfoodlists.isPaid','=',0)
                          ->select('orderfoodlists.*','foods.name as food_name','orders.order_time','orders.delivery_flag')
                          ->get();

      $waiting = $this->get_waiting_queue($customerOrders[0]->id);
      //echo $customerOrders;

      return view('customer.queue', [
          'title' => 'Queue',
          'orders' => $customerOrders,
          'queue' => $waiting
      ]);
    }

    public function delete_food_queue(Request $request)
    {
      if(!$request->session()->has('token'))
      {
        return redirect('/login');
      }
      $user = $this->get_user($request->session()->get('token'));
      if(!$user)
      {
        return redirect('/logout');
      }
      $food_id = $request->get('food_id');
      $order_id = $request->get('order_id');
      $qty = $request->get('qty');
      $food = Orderfoodlist::where('food_id', $food_id)
                             ->where('order_id', $order_id)
                             ->where('Qty',$qty)
                             ->where('cooking_flag',0)
                             ->where('serve_flag',0)
                             ->where('isPaid',0)
                             ->first();
      $food->delete();
      return redirect('/customer/queue');
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
        $customer->api_token = str_random(30);
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

    public function guest_view_menu(Request $request)
    {
      if($request->session()->has('token'))
      {
        return redirect('/customer/menu');
      }
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
