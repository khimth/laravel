@extends('layouts.shop')
@section('content')
    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="order">
                            <h2 class="h1 order-title text-center">Your Order</h2>
                            @if (Cart::getContent()->count() > 0)
                                    <table class="shop_table cart">
                                        <thead class="cart-product-wrap-title-main">
                                        <tr>
                                            <th class="product-thumbnail">Product</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Cart::getContent() as $item)
                                            <tr class="cart_item">

                                                <td class="product-thumbnail">

                                                    <div class="cart-product__item">
                                                        <div class="cart-product-content">
                                                            <h5 class="cart-product-title">{{$item->name}}</h5>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="product-quantity">

                                                    <div class="quantity">
                                                        x {{ $item->quantity }}
                                                    </div>

                                                </td>

                                                <td class="product-subtotal">
                                                    <h5 class="total amount">
                                                        £{{Cart::get($item->id)->getPriceSum()}}</h5>
                                                </td>

                                            </tr>
                                        @endforeach


                                        <tr class="cart_item subtotal">

                                            <td class="product-thumbnail">


                                                <div class="cart-product-content">
                                                    <h5 class="cart-product-title">Subtotal:</h5>
                                                </div>


                                            </td>

                                            <td class="product-quantity">

                                            </td>

                                            <td class="product-subtotal">
                                                <h5 class="total amount">£{{Cart::getSubTotal()}}</h5>
                                            </td>
                                        </tr>

                                        <tr class="cart_item total">

                                            <td class="product-thumbnail">


                                                <div class="cart-product-content">
                                                    <h5 class="cart-product-title">Total:</h5>
                                                </div>


                                            </td>

                                            <td class="product-quantity">

                                            </td>

                                            <td class="product-subtotal">
                                                <h5 class="total amount">£{{Cart::getTotal()}}</h5>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                    <div class="cheque">

                                        <div class="logos">
                                            <a href="#" class="logos-item">
                                                <img src="{{asset('app/img/visa.png')}}" alt="Visa">
                                            </a>
                                            <a href="#" class="logos-item">
                                                <img src="{{asset('app/img/mastercard.png')}}" alt="MasterCard">
                                            </a>
                                            <a href="#" class="logos-item">
                                                <img src="{{asset('app/img/discover.png')}}" alt="DISCOVER">
                                            </a>
                                            <a href="#" class="logos-item">
                                                <img src="{{asset('app/img/amex.png')}}" alt="Amex">
                                            </a>

                                            <span style="float: right;">
                                            <form action="{{route('cart.checkout')}}" method="POST">
                                                {{csrf_field()}}
                                                  <script
                                                          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                          data-key="pk_test_aqNYIpItEy235Rg1Hp3jBvdH00cnA0h3n3"
                                                          data-amount="{{Cart::getTotal() * 100}}"
                                                          data-name="Ecommerce Website Site"
                                                          data-description="Sale Item"
                                                          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                          data-locale="auto"
                                                          data-zip-code="true">
                                                  </script>
                                            </form>
							                </span>
                                        </div>
                                    </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
