<?php

namespace App\Http\Controllers;

use \Input as Input;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Promotion;
use App\Models\Order;
use App\Models\Orderfoodlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function food_view()
	{
		$foods = Food::all();
        foreach ($foods as $food)
        {
          if($food->havePromotion)
          {

            $food->price = (string)($food->price ) ." â»ÃâÁªÑè¹ ".(string)( $food->price - $food->havePromotion->discount_value);
          }
        }
        return view('manager.guest_menu', [
          'title' => 'Menu',
          'foods' => $foods
        ]);
	}

	public function food_add()
	{
		return view('manager.food_add', [
            'title' => 'Food Adding'
        ]);
	}

	public function store_food_add_data(Request $request)
	{
		/*
		picture uploading??
		*/

        return redirect('/manager-menu');
	}

	public function worker_view()
    {
		$workers = Employee::all();
	
        return view('manager.worker_list', [
            'title' => 'Manager',
			'workers' => $workers,
		]);
    }
}
