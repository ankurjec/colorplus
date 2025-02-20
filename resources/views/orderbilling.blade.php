@section('css')
    @parent

    <style>
        .modal-dialog {

            width: 360px;

        }

        .modal-header {

            background-color: #FFF;

            padding: 1px 16px;

            color: #FFF;

            border-bottom: 1px;

        }

        /* Default styles for the site logo */
        .site-logo {
            display: flex;
            align-items: center;
        }

        .site-logo img {
            margin-right: 10px;
        }

        .orderbilling-container {
            padding: 5% 8% 5%;

        }

        .order-details {
            display: flex;
            gap: 30px;
            justify-content: center;
            margin-bottom: 30px;
        }

        .order-id {
            padding: 10px;
            border-right: 1px solid gray;
            padding-right: 40px;
        }

        .order-id p {
            font-size: 14px;
            color: gray;
        }

        .order-desc {
            padding: 10px;
        }

        .order-desc p {
            font-size: 14px;
            color: gray;
        }

        .back-btn {
            width: 150px;
            height: 50px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e55039;
            border: 1px solid #e55039;
            cursor: pointer;
            transition: all .5s ease-in-out;
        }

        .back-btn a {
            text-decoration: none;
            color: white;
        }

        .back-btn:hover {
            background-color: #b53c29;
            border-radius: 10px;
            border: 1px solid #b53c29;
        }

        hr {
            width: 30%;
            height: 1px;
            border-bottom: 1px solid gray;
            margin: 10px 0px;
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .site-logo {
                flex-wrap: nowrap;
                justify-content: center;
                text-align: center;
            }

            .site-logo img {
                margin-right: 2px;
                height: 50px;
                width: 50px;
            }

            #zenith_title {
                font-size: 15px !important;
                margin-left: 5px;
            }

            .site-title {
                font-size: 79px;
                margin-left: 25px;
            }
        }
    </style>
@endsection
@extends('layouts.site-header')

@section('page-title', 'Order Details')
@section('content')

    <div class="container">
        {{-- <div class="orderbilling-container">
            @foreach ($orderDetails as $orderDetail)
                <div class="order-details">
                    <div class="order-id">
                        <h3>Order ID: {{ $orderDetail->id }}</h3>
                        <hr>
                        <p>Order Date: {{ $orderDetail->created_at->format('d-m-y | H:i:s') }}</p>
                    </div>
                    <div class="order-desc">
                        <h3>Shipping Address</h3>
                        <hr>
                        <p>Customer Name: {{ $orderDetail->name }}</p>
                        <p>Billing Address: {{ $orderDetail->address }}, {{ $orderDetail->state }}, {{ $orderDetail->pincode }}</p>
                        <p>Email: {{ $orderDetail->email }}</p>
                        <p>Phone: {{ $orderDetail->phone }}</p>
                        <p>Status: <strong style="color: green">{{ $orderDetail->status }}</strong></p>
                    </div>
                </div>
            @endforeach
            <div class="back-btn"><a href="/">Return to Home</a></div>
        </div> --}}

        {{-- New Code --}}
        <div class="px-[5%] py-4 max-sm:px-0">
            <div class="flex items-start justify-between w-[100%] gap-[60px] max-sm:flex-col max-sm:gap-4">
                <div class="border-r-2 pr-10 w-[33%] h-auto max-sm:w-full max-sm:border-2 max-sm:p-2">
                    <div class="text-[18px] font-semibold max-sm:border-b-2 max-sm:py-2">Product Details</div>
                    <div class="mt-2 items-center">
                        <div class="flex items-center justify-between pb-4">
                            <div class="text-[14px] font-normal">
                                {{-- <div> Order Id: #123</div> --}}
                                <div>Date: 12 july 2023</div>
                                <div>Order Status: <span class="text-[#e55039] font-semibold">Delivered</span></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div>

                                <img src="{{ asset('images/product_01.png') }}" alt="Product Image"
                                    style="height: 120px; width: 120px;">

                            </div>
                            <div>
                                <div>Product Name</div>
                                <div>Qty: 1</div>
                                <div>Price: 123</div>
                            </div>
                        </div>
                        <div class="bg-[#e55039] text-white p-[3px] text-center text-[13px]">Your order has been delivered</div>
                    </div>
                </div>
                <div class="w-[25%] border-r-2 h-auto max-sm:w-full max-sm:border-2 max-sm:p-2">
                    <div class="text-[18px] font-semibold max-sm:border-b-2 max-sm:py-2">Delivery Address</div>
                    <div class="mt-10 max-sm:mt-2">
                        <div class="text-[16px] font-medium mb-2">User Name</div>
                        <div class="flex items-start gap-2">
                            {{-- <i class="fa-solid fa-location-dot" style="font-size: 25px"></i> --}}
                            <div class="flex flex-col text-gray-700 leading-5 gap-1 text-[14px]">
                                Agro Zenith Sciences<br />505, Block-5, Srping Valley, Guwahati,
                                Assam 781013
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-[25%] h-auto max-sm:w-full max-sm:border-2 max-sm:p-2">
                    <div class="text-[18px] font-semibold max-sm:border-b-2 max-sm:py-2">Order Summery</div>

                    {{-- <div class="text-[#e55039] text-[14px] font-medium cursor-pointer mt-10 max-sm:mt-2">
                        Download Invoice
                    </div> --}}
                    <div class="w-[120%] max-sm:w-[100%] max-[768px]:w-[120%]">
                        <div class="w-[100%] py-3 rounded-md">
                            {{-- <div class="text-gray text-[12px] pb-2">Order Id: #123</div> --}}
                            <div>
                                <div class="flex items-center justify-between text-[14px]">
                                    <div>Sub Total:</div>
                                    <div>Rs.123.00</div>
                                </div>
                                <div class="flex items-center justify-between text-[13px]">
                                    <div>Delivery:</div>
                                    <div>
                                        <del>Rs.80.00</del> <span class="text-rose-500">FREE</span>
                                    </div>
                                </div>
    
                                {{-- <div class="flex items-center justify-between border-b-2 pb-2">
                        <div>Total:</div>
                        <div>123.00</div>
                      </div> --}}
                                <div class="flex items-center justify-between text-[13px] border-b-2 pb-2">
                                    <div>Payment Method:</div>
                                    <div class="text-green-600">Cash On Delivery</div>
                                </div>
                                <div class="flex items-center justify-between pt-2">
                                    <div class="font-bold">Total:</div>
                                    <div class="font-bold">123.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="text-[13px] p-2 mt-2 bg-[#e55039] text-white rounded-md">Download Invoice</button>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

    <script>
        $(document).ready(function() {
            function alignModal() {
                var modalDialog = $(this).find(".modal-dialog");

                // Applying the top margin on modal to align it vertically center
                modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
            }
            // Align modal when it is displayed
            $(".modal").on("shown.bs.modal", alignModal);

            // Align modal when user resize the window
            $(window).on("resize", function() {
                $(".modal:visible").each(alignModal);
            });
        });
    </script>

@endsection
@section('scripts')
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

    <script>
        $(document).ready(function() {
            function alignModal() {
                var modalDialog = $(this).find(".modal-dialog");

                // Applying the top margin on modal to align it vertically center
                modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
            }
            // Align modal when it is displayed
            $(".modal").on("shown.bs.modal", alignModal);

            // Align modal when user resize the window
            $(window).on("resize", function() {
                $(".modal:visible").each(alignModal);
            });
        });
    </script>

@endsection
