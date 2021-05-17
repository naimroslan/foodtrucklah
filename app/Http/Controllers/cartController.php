<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;
use Cart;

class cartController extends Controller
{
    public function insert(Request $request) {
        $dish = Dish::where('dish_id', $request->dish_id)->first();

        Cart::add([
            'id' => $request->dish_id,
            'qty' => $request->qty,
            'name' => $dish->dish_name,
            'price' => $dish->full_price,
            'weight' => 550,
            'options' =>
            [
                'half_price' => $dish->half_price,
                'image' => $dish->dish_image,
            ]

        ]);

        return redirect()->route('cart_show');
    }

    public function show() {

        $CartDish = Cart::content();

        return view('frontend.cart.show', compact('CartDish'));
    }

    public function update(Request $request) {
        Cart::update($request->rowId, $request->qty);

        return back();
    }

    public function remove($rowId) {
        Cart::remove($rowId);

        return back();
    }
}
