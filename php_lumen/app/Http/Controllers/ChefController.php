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

class ChefController extends Controller
{
    public function menu_list()
    {
		$orders = DB::table('Orderfoodlists')
					->join('Foods', 'Orderfoodlists.food_id', '=', 'Foods.id' )
					->join('Orders', 'Orderfoodlists.order_id' , '=', 'Orders.id')
					->where( 'Orderfoodlists.isPaid' , '=', 0)
					->orderBy('Orders.order_time')
					->get();
	
        return view('chef.menu_list', [
            'title' => 'Chef',
			'orders' => $orders,
		]);
    }

	public function update_order_status_cooking(Request $request)
	{
		
		$order_id = $request->order_id;
		$food_id = $request->food_id;

		$order = DB::table('Orderfoodlists')
					->where('Orderfoodlists.order_id', $order_id)
					->where('Orderfoodlists.food_id', $food_id)
					->update(['Orderfoodlists.cooking_flag' => 1]);
		

		return redirect('/chef-queue');

	}
	
	public function update_order_status_ready(Request $request)
	{
		
		$order_id = $request->order_id;
		$food_id = $request->food_id;

		$order = DB::table('Orderfoodlists')
					->where('Orderfoodlists.order_id', $order_id)
					->where('Orderfoodlists.food_id', $food_id)
					->update(['Orderfoodlists.serve_flag' => 1]);
		

		return redirect('/chef-queue');

	}

	public function cancel_order(Request $request)
	{
		
		$order_id = $request->order_id;
		$food_id = $request->food_id;

		$order = DB::table('Orderfoodlists')
					->where('Orderfoodlists.order_id', $order_id)
					->where('Orderfoodlists.food_id', $food_id)
					->delete();
		

		return redirect('/chef-queue');

	}
}
