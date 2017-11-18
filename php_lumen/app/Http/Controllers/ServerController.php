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
                    ->where('delivery_flag', '=', '1')
                    ->get();

        return view('server.delivery', [
            'title' => 'Delivery',
			'orders' => $orders,
		]);
    }
     public function waiter()
    {
        $orders = DB::table('Orderfoodlists')
                    ->join('Foods', 'Orderfoodlists.food_id', '=', 'Foods.id' )
                    ->join('Orders', 'Orderfoodlists.order_id' , '=', 'Orders.id')
                    ->where('delivery_flag', '=', '0')
                    ->get();

        return view('server.waiter', [
            'title' => 'Serve',
            'orders' => $orders,
        ]);
    }

    // public function edit_served($request)
    // {
    //     $order_id = $request->order_id;
    //     $food_id = $request->food_id;
    //     $order = DB::table('Orderfoodlists')
    //                 ->where('Orderfoodlists.order_id', $order_id)
    //                 ->where('Orderfoodlists.food_id', $food_id)
    //                 ->update(['Orderfoodlists.isPaid' => 1]);
        
    //     return view('cashier.show_order_list', [
    //         'title' => 'Cashier',
    //         'orders' => $orders,
    //     ]);

    // }
    public function edit_paid_for_delivery($request)
    {
        $order_id = $request->order_id;
        $food_id = $request->food_id;
        $order = DB::table('Orderfoodlists')
                    ->where('Orderfoodlists.order_id', $order_id)
                    ->where('Orderfoodlists.food_id', $food_id)
                    ->update(['Orderfoodlists.isPaid' => 1]);
        
        return view('cashier.show_order_list', [
            'title' => 'Cashier',
            'orders' => $orders,
        ]);

    }
}
