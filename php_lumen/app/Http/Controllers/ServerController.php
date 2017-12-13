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

class ServerController extends Controller
{
    public function delivery()
    {
		$orders = DB::table('Orderfoodlists')
                    ->join('Foods', 'Orderfoodlists.food_id', '=', 'Foods.id' )
                    ->join('Orders', 'Orderfoodlists.order_id' , '=', 'Orders.id')
                    ->join('Customers', 'Customers.id' , '=', 'Orders.customer_id')
                    ->where('delivery_flag', '=', '1', 'AND', 'serve_flag', '=', '1' , 'AND', 'cooking_flag', '=', '1','AND')
                    ->where('isPaid', '=','0')
                    ->groupBy('Orders.id')
                    ->orderBy('Customer_id','ASC')
                    ->get();

        return view('server.delivery', [
            'title' => 'Delivery',
			'orders' => $orders,
		]);
    }

    public function show_order_list_delivery($table)
    {
            $foods = Orderfoodlist::where('order_id','=', $table)->get();
            $promotions = Promotion::all();
        return view('server.show_order_list_delivery', [
            'title' => 'Show detail',
            'promotions' => $promotions,
            'foods' => $foods,
        ]);
    }
     public function waiter()
    {
        $orders = DB::table('Orderfoodlists')
                    ->join('Foods', 'Orderfoodlists.food_id', '=', 'Foods.id' )
                    ->join('Orders', 'Orderfoodlists.order_id' , '=', 'Orders.id')
                    /*->where('delivery_flag', '=', '0')
                    ->where('cooking_flag', '=', '0')
                    ->where('serve_flag', '=', '0')*/
                    ->where('isServe', '=', '0')
                    ->orderBy('order_id','ASC')
                    ->get();

        return view('server.waiter', [
            'title' => 'Serve',
            'orders' => $orders,
        ]);
    }

    public function map($customer_id)
    {
        $orders = DB::table('Orderfoodlists')
                    ->join('Foods', 'Orderfoodlists.food_id', '=', 'Foods.id' )
                    ->join('Orders', 'Orderfoodlists.order_id' , '=', 'Orders.id')
                    ->join('Customers', 'Orders.Customer_id' , '=', 'Customers.id')
                    ->where('Customer_id', '=', $customer_id, 'AND','delivery_flag', '=', '1' )
                    ->get();

        return view('server.map', [
            'title' => 'Map',
            'orders' => $orders,
        ]);
    }

    public function edit_served(Request $request)
    {
        $order_id = $request->order_id;
        $food_id = $request->food_id;
        $order = DB::table('Orderfoodlists')
                    ->where('Orderfoodlists.order_id', $order_id)
                    ->where('Orderfoodlists.food_id', $food_id)
                    ->update(['Orderfoodlists.isServe' => 1]);
       return redirect('/waiter');

    }

    public function edit_served_for_delivery(Request $request)
    {
        $order_id = $request->order_id;
        $food_id = $request->food_id;
        $order = DB::table('Orderfoodlists')
                    ->where('Orderfoodlists.order_id', $order_id)
                    ->where('Orderfoodlists.food_id', $food_id)
                    ->update(['Orderfoodlists.isServe' => 1]);
       return redirect('/delivery');

    }
    public function edit_paid_for_delivery(Request $request , $table)
     {        
        $order_id = $request->order_id;
        $food_id = $request->food_id;
        $foods = Orderfoodlist::where('order_id','=', $table)->update(['Orderfoodlists.isPaid' => 1]);
       return redirect('/delivery');
    }
}
