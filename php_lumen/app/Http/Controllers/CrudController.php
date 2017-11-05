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

    public function delete_order_list(Request $request)
    {
       $orders = Order::find($request->get('order_id'));
       foreach ($orders->haveFood as $food) {
         $food->delete();
       }
       $orders->delete();
       return redirect('/crud/order/view');
    }

    public function show_order_food_list(Request $request,$order_id)
    {

       $foods = Orderfoodlist::where('order_id', $order_id )->get();
       $availableFoods = Food::all();
       return view('crud.foodlist', [
           'title' => 'View foodlist of order '.$order_id,
           'foods' => $foods,
           'availableFoods' => $availableFoods,
           'order_id' => $order_id
       ]);
    }

    public function edit_order_food_list(Request $request,$fList_id)
    {
       $food = Orderfoodlist::find($fList_id )->first();
       $food->food_id = $request->get('food_id');
       $food->Qty = $request->get('Qty');
       $food->save();
       return redirect('/crud/order/edit/'.$request->get('listID'));
    }

    public function delete_order_food_list(Request $request,$fList_id)
    {
       $food = Orderfoodlist::find($fList_id )->first();
       $food->delete();
       return redirect('/crud/order/edit/'.$request->get('listID'));
    }


}
