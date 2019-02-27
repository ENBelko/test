<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
        $validated_item = $request->validate([
            'name' => 'required|min:3',
            'quantity' => 'required',
            'price' => 'required']);

        $product = Product::create($validated_item);

        return response()->json(['success' => 'Item has been ordered!',
            'name' => $validated_item['name'],
            'quantity' => $validated_item['quantity'],
            'price' => $validated_item['price']]);
    }

}
