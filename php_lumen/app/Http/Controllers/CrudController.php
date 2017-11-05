<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Promotion;
use App\Models\Order;
use App\Models\Orderfoodlist;
class CrudController extends Controller
{
    public function show_order_list()
    {
       $orders = Order::all();
       return view('crud.order', [
           'title' => 'View Order',
           'orders' => $orders
       ]);
    }

}
