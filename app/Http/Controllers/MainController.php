<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\PriceModel;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function main() {
        $prices = new PriceModel();
        return view('main', ['prices' => $prices->all()]);
    }

    public function buy(Request $request) {
        $id = $request->id;
        $product = PriceModel::find($id);
        if ($product && $product->count > 0) {
            return view('buy', ['selectedProductId' => $id, 'selectedProductCount' => $product->count]);
        } else {
            return redirect('/')->with('error', 'Товар закончился или недоступен');
        }
    }



    public function buy_check(Request $request) {
        $valid = $request->validate([
            'name' => 'required|min:3|max:100',
            'address' => 'required|min:10|max:100'
        ]);

        $order = new OrderModel();
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->save();
        $order->product_id = $request->input('product_id');

        $product = new PriceModel();
        $product = PriceModel::find($order->product_id);
        if($product) {
            $product->decrement('count', 1);
        }

        return redirect('/')->with(['success' => 'Спасибо за покупку: ' . $request->input('name')]);
    }
}
