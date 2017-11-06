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
use Illuminate\Http\UploadedFile;

class ManagerController extends Controller
{
    public function food_view()
	{
		$foods = Food::all();
        foreach ($foods as $food)
        {
          if($food->havePromotion)
          {

            $food->price = (string)($food->price ) ." โปรโมชั่น ".(string)( $food->price - $food->havePromotion->discount_value);
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
    $food = new Food;
    $food->name = $request->get('name');
    $food->type = $request->get('type');
    $food->price = $request->get('price');
    //$food->picture = $request->get('picture');
    $food->save();
    return redirect('/manager-menu');
		/*
		picture uploading??
		*/
		/*
		if ($request->hasFile('picture')) {
			$picture = $request->file('picture');
			$name = time().'.'.$picture->getClientOriginalExtension();
			$destinationPath = public_path('/img');
			$picture->move($destinationPath, $name);
			$type = $request->type;
			$price = $request->price;
			$this->save();
			echo "123123";
		}
		*/

			//$picture = $request->file('picture');
      // $file = $request->file('picture');
      // $imagedata = file_get_contents($file);
      // $base64 = base64_encode($imagedata);
      // echo $base64;
      //$picture->store('images');


        //return redirect('/manager-menu');
	}

	public function worker_view()
    {
		$workers = Employee::all();

        return view('manager.worker_list', [
            'title' => 'Manager',
			'workers' => $workers,
		]);
    }

	public function worker_add()
    {
        return view('manager.worker_add', [
            'title' => 'Manager: Adding Worker',
		]);

    }

	public function store_worker_add(Request $request)
    {
        $name = $request->input('name');
        $job = $request->input('job');

		$salary = $request->input('salary');
		//INSERT
        $worker = new Employee;
        $worker->name =$name;
        $worker->job = $job;

		if ($request->input('supervisor')) {
			$supervisor = $request->input('supervisor');
			$worker->supervisor =$supervisor;
        }

		$worker->salary =$salary;
        $worker->save();
        //end INSERT

        return redirect('/manager-worker');
    }

	public function worker_edit(Request $request)
    {
		$id = $request->input('id');

		$worker = Employee::findOrFail($id);

        return view('manager.worker_edit', [
            'title' => 'Manager: Editing Worker',
			'worker' => $worker,
		]);

    }

	public function store_worker_edit(Request $request)
	{

		$id = $request->id;
		$name = $request->name;
		$job = $request->job;
		if ($request->supervisor) {
			$supervisor = $request->supervisor;
		}else {
			$supervisor = null;
		}
		$supervisor = $request->supervisor;
		$salary = $request->salary;

		$worker = Employee::findOrFail($id);

		$worker->name = $name;
		$worker->job = $job;
		$worker->supervisor = $supervisor;
		$worker->salary = $salary;
		$worker->save();

		return redirect('/manager-worker');

	}

	public function worker_delete(Request $request)
	{
		$id = $request->id;
		$worker = Employee::findOrFail($id);
		$worker->delete();

		return redirect('/manager-worker');

	}

	public function promotion_view()
	{
		$promotions = Promotion::all();

        return view('manager.promotion_list', [
            'title' => 'Manager : Promotion View',
			'promotions' => $promotions,
		]);
	}

	public function promotion_edit(Request $request)
    {
		$id = $request->input('id');

		$promotion = Promotion::findOrFail($id);

        return view('manager.promotion_edit', [
            'title' => 'Manager: Editing Promotion',
			'promotion' => $promotion,
		]);

    }

	public function store_promotion_edit(Request $request)
	{

		$id = $request->id;
		$name = $request->name;
		$discount_for = $request->discount_for;
		$discount_value = $request->discount_value;
		$start_date = $request->start_date;
		$end_date = $request->end_date;


		$promotion = Promotion::findOrFail($id);

		$promotion->name = $name;
		$promotion->discount_for = $discount_for;
		$promotion->discount_value = $discount_value;
		$promotion->start_date = $start_date;
		$promotion->end_date = $end_date;

		$promotion->save();

		return redirect('/manager-promotion');

	}

	public function promotion_delete(Request $request)
	{
		$id = $request->id;
		$promotion = Promotion::findOrFail($id);
		$promotion->delete();

		return redirect('/manager-Promotion');

	}
}
