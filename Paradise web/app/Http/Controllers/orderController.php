<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainDishModel;
use App\SideDishModel;
use App\OrderModel;
use Carbon\Carbon;
use DB;

class orderController extends Controller
{
    public function index() {

    	$mainDishes = MainDishModel::get();
    	$sideDishes = SideDishModel::get();

    	return view('welcome',[
    		'mainDishList' => $mainDishes,
    		'sideDishList' => $sideDishes,
    	]);

    }

    public function order(Request $request) {
    	
    	$arrInputData = $request->input();

    	$objMainDish = MainDishModel::find($arrInputData['main_dish']);
    	$objSideDish = SideDishModel::find($arrInputData['side_dish']);

    	$objOrder = new OrderModel();
    	$objOrder->main_dish = $objMainDish->id;
    	$objOrder->side_dish = $objSideDish->id;
    	$objOrder->amount = (float)$objMainDish->price + (float)$objSideDish->price;
    	$objOrder->save();

    	return back()->with('success','Order has been created successfully!');

    }

    public function showOrder(Request $request) {

        $objOrder = OrderModel::join('main_dish','main_dish.id','=','orders.main_dish')
                    ->join('side_dish','side_dish.id','=','orders.side_dish')
                    ->get();
    	return view('orders', ['orderList' => $objOrder]);

    }


    public function makeReports(Request $request) {

        $orderObject = new OrderModel();

        $arrOrders = $orderObject->get();
        $formattedOrderList = [];

        foreach ($arrOrders as $key => $order) {

            $dateString = $order->created_at->format('m/d/Y');

            if (empty($formattedOrderList[$dateString])) {
                $formattedOrderList[$dateString] = (float)$order->amount;
            } else {
                $formattedOrderList[$dateString] = (float)$formattedOrderList[$dateString] + (float)$order->amount;
            }
        }


        $topMainDishes = DB::table('orders')
                        ->select('orders.main_dish','main_dish.main_dish_name',DB::raw('COUNT(main_dish) as count'))
                        ->join('main_dish','main_dish.id','=','orders.main_dish')
                        ->groupBy('main_dish','main_dish.main_dish_name')
                        ->orderBy('count','desc')
                        ->get();

        $topSideDishes = DB::table('orders')
                        ->select('orders.side_dish','side_dish.side_dish_name',DB::raw('COUNT(side_dish) as count'))
                        ->join('side_dish','side_dish.id','=','orders.side_dish')
                        ->groupBy('side_dish','side_dish.side_dish_name')
                        ->orderBy('count','desc')
                        ->get();

        return view('report',[
            'dailyRevenue' => $formattedOrderList,
            'topMainDishes' => $topMainDishes,
            'topSideDishes' => $topSideDishes,
        ]);

    }
}
