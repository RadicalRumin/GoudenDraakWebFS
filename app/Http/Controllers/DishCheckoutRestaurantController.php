<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Dish;
use Illuminate\Support\Facades\Cookie;
use App\Models\Order;
use App\Models\Order_Dish;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DishCheckoutRestaurantController extends Controller
{
    public function index()
    {
        return Inertia::render('Restaurant/Checkout');
    }

    public function store(Request $request)
    {


        $cookie = $request->cookie('restaurant_auth'); // e.g. "7|3"

        if (!$cookie) {
            return response('No cookie found')->setStatusCode(400);
        }

        $data = json_decode($cookie, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response('Invalid JSON in cookie', 400);
        }

        $lastOrderDate = Carbon::parse($data['lastOrderDate']) ?? null;
        $initialOrderDate = Carbon::parse($data['initialOrderDate']) ?? null;
        $tableNumber = $data['tableNumber'] ?? null;
        $rounds = $data['rounds'] ?? null;

        if($lastOrderDate == null || $tableNumber == null || $rounds == null) {
            return response("Cookie values are null")->setStatusCode(400);
        }

        if($rounds < 1){
            return response("Round limit reached")->withCookie(Cookie::forget('restaurant_auth'));
        }

        if ($lastOrderDate->diffInMinutes(Carbon::now()) < 10) {
            return response("Time limit not reached yet");
        }

        $dishesInput = $request->input("data");

        DB::transaction(function () use ($dishesInput, $tableNumber) {
            $order = new Order([
                'table_id' => $tableNumber,
            ]);
            $order->save();

            $orderDishes = collect();

            foreach ($dishesInput as $dish) {
                $existingOrderDish = $orderDishes->firstWhere('dish_id', $dish['id']);

                if ($existingOrderDish) {
                    $existingOrderDish->quantity += 1;
                } else {
                    $orderDish = new Order_Dish([
                        'order_id' => $order->id,
                        'dish_id' => $dish['id'],
                        'quantity' => 1,
                        'remark' => "",
                    ]);
                    $orderDishes->push($orderDish);
                }
            }

            $order->Order_Dish()->saveMany($orderDishes);
        });

        $rounds = $rounds -1;

        $tableAuth = collect([
            'lastOrderDate' => Carbon::now()->toIso8601String(),
            'initialOrderDate' => $initialOrderDate,
            'tableNumber' => $tableNumber,
            'rounds' => $rounds,
        ]);

        $cookie = Cookie::make('restaurant_auth', $tableAuth, 60, '/', null, false, false);

        if ($rounds == 0) {
            return redirect()->route('bill.show')->withCookie($cookie);
        }

        // 3. Set new cookie in the response
        return response("Cookie updated")->withCookie($cookie);
    }
}
