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
                    ->where('delivery_flag','=','0')
                    ->where('isPaid', '=','0')
                    ->groupBy('order_id')
                  //  ->join('Customers', 'Orders.Customer_id' , '=', 'Customers.id')
                    ->get();
        //$foods = Orderfoodlist::where('order_id','=', $table)->get();
        $promotions = Promotion::all();
        
        return view('cashier.cashier', [
            'title' => 'Cashier',
            'promotions' => $promotions,
            'orders' => $orders,
        ]);
    }

    public function show_order_list($table)
    {
            $foods = Orderfoodlist::where('order_id','=', $table)->get();
            $promotions = Promotion::all();
        return view('cashier.show_order_list', [
            'title' => 'Show detail',
            'promotions' => $promotions,
			'foods' => $foods,
		]);
    }


    public function edit_paid(Request $request, $table)
    {        
        $order_id = $request->order_id;
        $food_id = $request->food_id;
        $foods = Orderfoodlist::where('order_id','=', $table, 'AND', 'isPaid', '=', '0')->update(['Orderfoodlists.isPaid' => 1]);
       return redirect('/cashier');
    }

}
