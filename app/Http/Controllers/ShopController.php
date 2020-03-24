<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Product;
use Cart;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.ecommerce')->with(
          [
              'products' => Product::paginate(6),
              'title' => 'E-commerce website demo'
          ]
        );
    }

    public function productDetails($productId) {
        $product = Product::find($productId);
        return view('shop.product_details')->with(
            [
              'product' => $product,
              'title' => $product->name
            ]
        );
    }

    public function addToCart() {
        $product = Product::find(request()->product_id);
        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => request()->quantity,
            'attributes' => [],
            'associatedModel' => $product
        ]);
        return redirect()->back();
    }

    public function cart() {
        return view('shop.cart')->with(['title' => 'Shopping Cart']);
    }

    public function deleteCartItem($id) {
        Cart::remove($id);
        return redirect()->back();
    }

    public function itemIncrement($id) {
        Cart::update($id, ['quantity' => 1]);
        return redirect()->back();
    }

    public function itemDecrement($id) {
        Cart::update($id, ['quantity' => - 1]);
        return redirect()->back();
    }

    public function checkout() {
        return view('shop.checkout')->with(
            [
              'title' => 'Checkout'
            ]
        );
    }

    public function pay() {
        Stripe::setApiKey('sk_test_Ix4WGL2GwWOE90Vym4Q9nLXc00DluRbRLT');
        $token = request()->stripeToken;
        $charge = Charge::create(
          [
            'amount' => Cart::getTotal() * 100,
            'currency' => 'gbp',
            'description' => 'Example Website',
            'source' => $token
          ]
        );

        Session::flash('success', 'You have paid successfully');
        Cart::clear();
        Mail::to(request()->stripEmail)->send(new App\Mail\PurchaseSuccessful);
        return redirect('/shop');
    }


}
