<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Recommendation;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index( Request $request,$id){
        $recommendation = Recommendation::findOrFail($id);
        $price = $recommendation->price;

        $order = Order::create([
            'total_price' => $price,
            'recommendation_id' => $id,
        ]);
 //dd($price);
        $PaymentKey = PaymobController::pay( $price ,$order->id);
        return response()->json([
            'url'=>"https://accept.paymob.com/api/acceptance/iframes/852813?payment_token=".$PaymentKey,
            'message' => 'success',

        ], 200);
    }
}
