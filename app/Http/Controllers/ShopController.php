<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ShopController extends Controller
{
    public function index()
    {
        return view('ecommerce')->with(['products' => Product::paginate(6)]);
    }

    public function productDetails($productId) {

    }
}
