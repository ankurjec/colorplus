<div>
    <style>
        .btn-primary {
            color: #FFF;
            /* background-color: #51eaea; */
            background-color: #e74c3c !important;
            border-color: #e74c3c;
            /* border-color: #51eaea; */
        }

        .btn #continue {
            color: #FFF;
            background-color: #6fc455;
            background-image: none;
            border-color: #6fc455;
        }

        table.table-bordered {
            border-collapse: collapse;
        }


        table.table-bordered th,
        table.table-bordered td {
            border-bottom: 1px solid #dee2e6;
            /* Horizontal border color */
            border-top: 1px solid #dee2e6;
            /* Hide top border */
            border-right: none;
            /* Hide right border */
            border-left: none;
            line-height: 1.2;
            /* Adjust line-height to decrease row height */

            /* Hide left border */
        }

        body {
            margin: 0;
            font-family: "Rubik", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #f1f3f6;
        }


        .btn.btn-outline-minus:hover {
            background-color: #51eaea;
            /* Change the background color on hover */
        }

        .btn-outline-add {
            color: #51eaea;
            background-color: transparent;
            background-image: none;
            border-color: #51eaea;
            border-radius: 50%;
            /* Set border-radius to 50% for a fully oval shape */

        }

        .btn.btn-outline-add:hover {
            background-color: #51eaea;
            /* Change the background color on hover */
        }

        .btn-outline-continue {
            color: #FFF;
            background-color: #66746a;
            background-image: none;
            border-color: #66746a;
        }

        .btn.btn-outline-continue:hover {
            background-color: #51eaea;
            /* Change the background color on hover */
        }

        .btn-checkout {
            color: #FFF;
            background-color: #459968;
            border-color: #278850;
        }

        .btn.btn-checkout:hover {
            background-color: #51eaea;
            /* Change the background color on hover */
        }

        /* New design CSS Code */
        table {
            width: 100%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .product img {
            max-width: 100px;
        }

        .quantity input {
            width: 30px;
            text-align: center;
        }

        .remove-btn {
            color: #e74c3c;
            cursor: pointer;
        }

        .subtotal {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
        }

        .quantity button {
            padding: 10px;
            border: none;
            background-color: #e74c3c;
            margin: auto;
        }

        .quantity input {
            padding: 10px;
            border: 1px solid #e74c3c;
        }

        .btn-chkout {
            /* float: right; */
            margin-top: 40px;
            width: 100%;
        }

        .btn-chkout a {
            width: 100%;
            padding: 16px;
            background-color: #e74c3c;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease-in-out;
            border: 1px solid #e74c3c;
        }

        .btn-chkout a:hover {
            border: 1px solid #e74c3c;
            color: #e74c3c;
            background-color: transparent;
            transform: translateX(10px);
        }

        .shopping-cart {
            padding: 5% 0%;
        }

        .total {
            display: flex;
            justify-content: space-between;
        }

        .sub-total {
            display: block;
            align-items: end;
            width: 25%;
            padding-bottom: 0px;
        }

        .title-sub {
            padding-bottom: 20px;
            border-bottom: 1px solid gray;
        }

        .total-prices p {
            padding: 5px 0px;
        }
        @media only screen and (max-width:600px){
            .total{
                flex-direction: column-reverse;
                width: 100%;
                justify-content: center;
            }
            .sub-total{
                width: 100%;
                margin: auto;
            }
            .btn-chkout{
                margin-bottom: 40px;
            }
        }
    </style>

    {{-- New code --}}

    <div class="shopping-cart">
        <h3 class="cart-title">Shopping Cart</h3>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($shoppings as $shop)
                    <tr class="product">
                        <td>
                            <img src="{{ asset($shop->product->images[0]->url) }}" alt="{{ $shop->product->name }}" />
                        </td>
                        <td class="product-name">{{ $shop->product->name }}</td>
                        <td class="product-price">Rs.{{ number_format($shop->product->price, 2) }}</td>
                        <td class="quantity">
                            <div class="quantity-btn">
                                <button wire:click="decrementQty('{{ $shop->id }}')">-</button>
                                <input type="text" value="{{ $shop->quantity }}" />
                                <button wire:click="incrementQty('{{ $shop->id }}')">+</button>
                            </div>
                        </td>
                        <td class="remove-btn" wire:click="deleteId('{{ $shop->id }}')" data-toggle="modal"
                            data-target="#exampleModal">Remove</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Your cart is empty.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="total">
            <div class="btn-chkout">
                <a href="/shop">Continue Shopping</a>
            </div>
            <div class="sub-total">
                <h3 class="title-sub">Cart Total</h3>
                <div class="total-prices">
                    <p>Sub Total: Rs.{{ number_format($total, 2) }}</p>
                    <p>Delivery Charges: Rs. <del>80.00</del> <span style="color: #278850;">Free</span></p>
                    <p><Strong>Total: Rs.{{ number_format($total, 2) }} </Strong>
                    </p>
                </div>
                <div class="btn-chkout">
                    <a href="{{route('orderdetail')}}">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            {{-- <div class="modal-dialog" role="document" style="margin-top: 150px;"> --}}
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Remove Item
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this item?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">CANCEL</button>
                    <button type="button" wire:click.prevent="delete()" class="btn btn-primary close-modal"
                        data-dismiss="modal">REMOVE</button>
                </div>
            </div>
        </div>


        {{-- Model --}}

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item from your wishlist?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <br>
        @if (session()->has('message'))
            <div class="alert alert-primary alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (!$shoppings->isEmpty())
            <br>
            <form action="{{ route('update_cart') }}" class="col-md-12" method="post">
                <div class="row mb-5" id="ovrerlay">
                    <div class="site-blocks-table col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shoppings as $shop)
                                    <tr>
                                        <td class="product-thumbnail" style="padding: 2px;height:200px;">
                                            <a href="{{ route('shop-single', ['productID' => $shop->product_id]) }}">

                                                <img src="{{ asset($shop->product->images[0]->url) }}" alt="Image"
                                                    class="img-fluid" style="height: 100%; width: 100%;">
                                            </a>
                                        </td>
                                        <td class="product-name" style="padding: 2px;">
                                            <h2 class="h5 text-black">{{ $shop->product->name }}</h2>
                                        </td>
                                        <td>RS.<span class="price"
                                                style="padding: 2px;">{{ $shop->product->price }}</span></td>
                                        <td style="padding: 2px;">
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-minus"
                                                        wire:click="decrementQty('{{ $shop->id }}')"
                                                        type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center"
                                                    name="quantity[{{ $shop->id }}]"
                                                    value="{{ $shop->quantity }}" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-add"
                                                        wire:click="incrementQty('{{ $shop->id }}')"
                                                        type="button">&plus;</button>
                                                </div>
                                            </div>

                                        </td>
                                        <td style="padding: 2px;">
                                            @php
                                                $perTotal = $shop->product->price * $shop->quantity;
                                            @endphp
                                            Rs.<span class="total">{{ number_format($perTotal, 2) }}</span>
                                        </td>
                                        <td style="padding: 2px;">
                                            <button type="button" wire:click="deleteId('{{ $shop->id }}')"
                                                class="btn btn-info height-auto btn-sm" data-toggle="modal"
                                                data-target="#exampleModal">&times;</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

    </div>

    {{-- <div class="row"> --}}
        {{-- <div class="col-md-6"> --}}
            {{-- <div class="row mb-5"> --}}
                {{-- <div class="col-md-6 mb-3 mb-md-0">
                        <button type="submit" name="update" value="go" class="btn btn-primary btn-md btn-block">Update
                            Cart</button>
                    </div> --}}
                {{-- <div class="col-md-12">
                    <button type="submit" id="continue" name="continue" value="go"
                        class="btn btn-outline-continue btn-md btn-block">Continue Shopping</button>
                </div> --}}
            {{-- </div> --}}
            {{-- <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
                    </div>
                </div> --}}
        {{-- </div>
        <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12 text-left border-bottom mb-5">
                            <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div> --}}
                        {{-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>

                                <div class="col-md-6 text-right">
                                    <strong class="text-black">Rs.{{ number_format($total, 2) }}</strong>
                                </div>
                            </div> --}}
                    {{-- </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <span class="text-black">Subtotal</span>
                        </div>

                        <div class="col-md-6 text-right">
                            <span class="text-black">Rs.{{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <span class="text-black">Price ({{ $shop->quantity }} item)</span>
                        </div>

                        <div class="col-md-6 text-right">
                            <span class="text-black">Rs.{{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <span class="text-black">Deivery Charges</span>
                        </div>

                        <div class="col-md-6 text-right">
                            <span class="text-black"><del>Rs.80</del>&nbsp;<span
                                    style="color:green">Free</span></span>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <strong class="text-black">Total Amount</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <strong class="text-black">Rs.{{ number_format($total, 2) }}</strong>
                        </div>
                    </div> --}}

                    {{-- <div class="row">
                        <div class="col-md-12">
                            @if (auth()->check())
                                <button type="button" id="proceed" onclick="window.location='orderdetail'"
                                    class="btn btn-checkout btn-lg">Proceed To Checkout</button> --}}
                                {{-- <button type="submit" name="continue" value="go"
                                    class="btn btn-outline-primary btn-md btn-block">Continue Shopping</button> --}}
                            {{-- @else
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                    data-target="#myModal">
                                    Proceed To Checkout
                                </button>
                            @endif
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @csrf
    </form>
@else
    {{-- <div class="col-md-6">
        <p>Your cart is empty.</p>
    </div> --}}
    {{-- <div class="row">
        <div class="col-md-6">
            <form action="{{ route('update_cart') }}" method="post">
                @csrf
                <button type="submit" name="continue" value="go" class="btn btn-primary btn-lg">Continue
                    Shopping</button>
            </form>
        </div>
    </div> --}}
    @endif
</div>
