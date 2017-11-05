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
					->get();
	
        return view('chef.menu_list', [
            'title' => 'Chef',
			'orders' => $orders,
		]);
    }
}
