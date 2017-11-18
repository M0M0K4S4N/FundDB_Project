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

class CashierController extends Controller
{
    public function check_bill()
    {
		//$orders = Orderfoodlist::All();
        $orders = DB::table('Orderfoodlists')
                    ->join('Foods', 'Orderfoodlists.food_id', '=', 'Foods.id' )
                    ->join('Orders', 'Orderfoodlists.order_id' , '=', 'Orders.id')
                    ->groupBy('order_id')
                  //  ->join('Customers', 'Orders.Customer_id' , '=', 'Customers.id')
                    ->get();
        
        return view('cashier.cashier', [
            'title' => 'Cashier',
            'orders' => $orders,
        ]);
    }

    public function show_order_list($table)
    {
    	      $orders = DB::table('Orderfoodlists')
                    ->join('Foods', 'Orderfoodlists.food_id', '=', 'Foods.id' )
                    ->join('Orders', 'Orderfoodlists.order_id' , '=', 'Orders.id')
                    ->where('order_id' , '=', $table)
                  //  ->join('Customers', 'Orders.Customer_id' , '=', 'Customers.id')
                    ->get();
        return view('cashier.show_order_list', [
            'title' => 'Show detail',
			'orders' => $orders,
		]);
    }


    public function edit_paid(Request $request)
    {        
        $order_id = $request->order_id;
        $food_id = $request->food_id;
        $order = DB::table('Orderfoodlists')
                    ->where('Orderfoodlists.order_id', $order_id)
                    ->where('Orderfoodlists.food_id', $food_id)
                    ->update(['Orderfoodlists.isPaid' => 1]);
       return redirect('/cashier');
    }

}
