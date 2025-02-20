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
            background-color: rgb(245, 245, 245) !important;
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

        /* .shopping-cart {
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
 } */

        .title-sub {
            padding-bottom: 20px;
            border-bottom: 1px solid gray;
        }

        .total-prices p {
            padding: 5px 0px;
        }

        /* @media only screen and (max-width:600px) {
  .total {
   flex-direction: column-reverse;
   width: 100%;
   justify-content: center;
  }
 
  .sub-total {
   width: 100%;
   margin: auto;
  }
 
  .btn-chkout {
   margin-bottom: 40px;
  }
 } */


        /* New Cart CSS Code */
        .cart-shop {
            padding: 2% 0%;
        }

        .product-price-cart {
            width: 100%;
            display: flex;
            align-items: start;
            justify-content: space-between;
            margin-top: 20px;
        }

        .product-carts {
            width: 65%;
            background-color: white;
            height: auto;
            padding: 20px;
            /* border-radius: 10px; */
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .price-cart {
            width: 33%;
            background-color: white;
            height: auto;
            padding: 20px;
            /* border-radius: 10px; */
        }

        .product-cart {
            width: 100%;
            height: auto;
            padding: 15px;
            background-color: rgb(250, 250, 250);
            display: flex;
            align-items: center;
            gap: 20px;
            border-radius: 10px;
        }

        .product-image {
            width: 150px;
            height: 150px;
            padding: 10px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
        }

        .btn-increase {
            display: flex;
            margin: 10px 0px;
        }

        .btn-increase button {
            padding: 3px 10px;
            cursor: pointer;
            background-color: transparent;
            /* background-color: #e74c3c; */
            color: #e74c3c;
            border: 1px solid #e74c3c;
        }

        .btn-increase input {
            width: 40px;
            text-align: center;
            border: 1px solid #e74c3c;
            outline: none;
        }

        .btn-increase button:hover {
            background-color: #e74c3c;
            color: white;
        }

        .btn-list {
            display: flex;
            gap: 20px;
        }

        .btn-list button {
            border: none;
            outline: none;
            background-color: transparent;
            cursor: pointer;
        }

        .btn-list button:hover {
            color: #e74c3c;
            font-weight: 600;
        }

        .sub-total {
            display: block;
            align-items: end;
            width: 100%;
            padding-bottom: 0px;
        }

        .title-sub {
            padding-bottom: 20px;
            border-bottom: 1px solid gray;
        }

        .total-prices p {
            padding: 5px 0px;
        }

        .btn-chkout {
            margin: 30px 0px;
            width: 100%;
        }

        .btn-chkout a {
            width: 100%;
            padding: 12px;
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

        .price-product {
            font-weight: 600;
        }

        @media screen and (max-width:600px) {
            .product-price-cart {
                flex-direction: column;
                gap: 20px;
            }

            .product-carts {
                width: 100%;
            }

            .price-cart {
                width: 100%;
            }

            .btn-list {
                gap: 10px;
            }

            .product-cart {
                height: auto;
                padding: 10px;
                line-height: 15px;
                gap: 0px;
            }
        }

        /* Progress bar setp css code */
        .container {
            width: 100%;
            padding-top: 30px;
        }

        .progressbar {
            counter-reset: step;
        }

        .progressbar li {
            list-style: none;
            display: inline-block;
            width: 30.33%;
            position: relative;
            text-align: center;
            cursor: pointer;
        }

        .progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 35px;
            height: 35px;
            line-height: 33px;
            border: 2px solid #ddd;
            border-radius: 100%;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            background-color: #fff;
        }

        .progressbar li:after {
            content: "";
            position: absolute;
            width: 100%;
            height: 4px;
            background-color: #ddd;
            top: 15px;
            left: -50%;
            z-index: -1;
        }

        .progressbar li:first-child:after {
            content: none;
        }

        .progressbar li.active {
            color: #e74c3c;
        }

        /* .progressbar li.active:before {
            border-color: #e74c3c;
            background-color: #e74c3c;
            color: white;
        } */

        /* .progressbar li.active+li:after {
            background-color: #e74c3c;
        } */

        .progressbar li.active:after {
            background-color: #e74c3c;
        }
        .progressbar li.active::before{
            background-color: #e74c3c;
            color: white;
            border-color: #e74c3c;
        }
    </style>

    {{-- Code for mutli step progress bar --}}
    <div class="h-full w-full py-16">
        <div class="container mx-auto">
            <dh-component>
                <div class="w-[12/12] lg:w-2/4 mx-auto">
                    <div class="bg-gray-200 h-1 flex items-center justify-between">
                        {{-- <div class="w-1/3 bg-[#e74c3c] h-1 flex items-center relative">
                            <div class="bg-[#e74c3c] h-6 w-6 rounded-full shadow flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check"
                                    width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M5 12l5 5l10 -10" />
                                </svg>
                                <p tabindex="0" class="focus:outline-none text-[#e74c3c] absolute top-5 text-xs font-bold w-[50%]">Step
                                    1: Shopping Cart</p>
                            </div>
                        </div> --}}
                        <div class="w-1/3 flex justify-between bg-[#e74c3c] h-1 items-center relative">
                            <div class="absolute right-0 -mr-2">
                                <div class="relative bg-white shadow-lg px-2 py-1 rounded mt-16 -mr-12">
                                    <svg class="absolute top-0 -mt-1 w-full right-0 left-0" width="16px"
                                        height="8px" viewBox="0 0 16 8" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Progress-Bars" transform="translate(-322.000000, -198.000000)"
                                                fill="#FFFFFF">
                                                <g id="Group-4" transform="translate(310.000000, 198.000000)">
                                                    <polygon id="Triangle" points="20 0 28 8 12 8"></polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <p tabindex="0" class="focus:outline-none text-[#e74c3c] text-xs font-bold">Step
                                        2: Address</p>
                                </div>
                            </div>
                            <div
                                class="bg-[#e74c3c] h-6 w-6 rounded-full shadow flex items-center justify-center -ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check"
                                    width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M5 12l5 5l10 -10" />
                                </svg>
                                <p tabindex="1" class="focus:outline-none text-[#e74c3c] text-xs font-bold absolute top-5 w-[45%]">Step
                                    1: Shopping Cart</p>
                            </div>
                            <div
                                class="bg-white h-6 w-6 rounded-full shadow flex items-center justify-center -mr-3 relative">
                                <div class="h-3 w-3 bg-[#e74c3c] rounded-full"></div>
                            </div>
                        </div>
                        <div class="w-1/3 flex justify-end relative">
                            <div class="bg-white h-6 w-6 rounded-full shadow">
                                <p tabindex="0" class="focus:outline-none text-gray-400 text-xs font-bold absolute top-8 right-[-12] w-[55%]">Step 3: Payment</p>
                            </div>
                        </div>
                        <div class="w-1/3 flex justify-end relative">
                            <div class="bg-white h-6 w-6 rounded-full shadow">
                                <p tabindex="0" class="focus:outline-none text-gray-400 text-xs font-bold absolute top-8 right-[-12] w-[55%]">Step 4: Order Placed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </dh-component>
        </div>
    </div>

    {{-- Code without tailwind --}}
    {{-- <div class="container">
        <ul class="progressbar">
            <li class="active">Shopping Cart</li>
            <li class="active">Checkout</li>
            <li class="">Placed Order</li>
        </ul>
    </div> --}}




    <div class="cart-shop">
        {{-- <h3 class="cart-title">Shopping Cart</h3> --}}
        <div class="product-price-cart">
            <div class="product-carts">
                @forelse($shoppings as $shop)
                    <div class="product-cart">
                        <div class="product-image">
                            <img src="{{ asset($shop->product->images[0]->url) }}" alt="{{ $shop->product->name }}" />
                        </div>
                        <div class="cart-product-details">
                            <h3 class="title-product">{{ $shop->product->name }}</h3>
                            <p class="price-product">Rs.{{ number_format($shop->product->price, 2) }}</p>
                            <div class="btn-increase">
                                <button wire:click="decrementQty('{{ $shop->id }}')"
                                    @if ($shop->quantity == 1) disabled @endif>-</button>
                                <input type="text" readonly value="{{ $shop->quantity }}" />
                                <button wire:click="incrementQty('{{ $shop->id }}')">+</button>
                            </div>
                            <div class="btn-list">
                                <button wire:click="deleteId('{{ $shop->id }}')" data-toggle="modal"
                                    data-target="#exampleModal">Remove</button>
                                <button>Save for Later</button>
                                <button>Share</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="product-cart">
                        <p>Your cart is empty.</p>
                    </div>
                @endforelse
                <div class="btn-chkout"><a href="/shop">Continue Shopping</a></div>
            </div>

            <?php if ($total != 0): ?>
            <div class="price-cart">
                <div class="sub-total">
                    <h3 class="title-sub">Cart Total</h3>
                    <div class="total-prices">
                        <p>Sub Total:&nbsp; {{ number_format($total, 2) }}</p>
                        <p>Delivery Charges: <del>Rs.123.00</del> <span style="color: green;">Free</span></p>
                        <h4>Total: {{ number_format($total, 2) }}</h4>
                    </div>
                    <div class="btn-chkout"><a href="{{ route('orderdetail-page') }}">Proceed to Checkout</a></div>
                </div>
            </div>
            <?php else: ?>
            <div>
                <div>
                    <div></div>
                </div>
            </div>
            <?php endif; ?>


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
        {{-- Modal --}}

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
                @csrf
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


</div>
</div>
</div>
</div>
</div>
</form>
@else
@endif
</div>
</div>
</div>
