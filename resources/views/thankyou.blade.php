@extends('layouts.site-header')

@section('css')
    @parent
    <style>
        .order-container {
            width: 100%;
            height: 100%;
            padding: 5% 8% 5%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 30px;
        }

        .order-success {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .order-success img {
            width: 80px;
            height: 80px;
        }

        .order-success h2 {
            font-size: 28px;
            color: #b52c39;
            text-align: center;
            line-height: 2rem;
            font-weight: 500;
        }

        .order-success p {
            width: 100%;
            text-align: center;
            font-size: 16px
        }

        .btn-1 {
            background-color: transparent;
            padding: 10px 16px;
            border-radius: 5px;
            border: 1px solid #e55039;
            text-decoration: none;
            color: #e55039;
            margin-right: 20px;
            transition: all 0.3s ease-in-out;
        }

        .btn-1:hover {
            background-color: #e55039;
            color: white;
        }

        .btn-2 {
            background-color: transparent;
            padding: 10px 16px;
            background-color: #e55039;
            border-radius: 5px;
            border: 1px solid #e55039;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease-in-out;
        }

        .btn-2:hover {
            background-color: #b52c39;
            border: 1px solid #b52c39;
        }

        @media screen and (max-width: 600px) {
            .order-container {
                width: 100%;
                height: 100%;
            }

            .order-success img {
                width: 80px;
                height: 80px;
                
            }

            .order-success p {
                width: 100%;
                line-height: 1.5rem;
                font-size: 16px;
            }
            .order-success h2{
              font-size: 25px;
            }

            .btn-order {
                display: flex;
                width: 100%;
                flex-direction: column-reverse;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .btn-1 {
                margin: auto;
            }
            .order-container{}
        }

        @keyframes fade-down {
            0% {
                opacity: 0;
                transform: translateY(-200px);
            }

            100% {
                opacity: 1;
                transform: translateY(0px);
            }
        }

        /* New Code For Order Details */
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
            font-size: 20px;
            font-weight: 500;
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
    </style>
@endsection



@section('page-title', 'Thank You')
@section('content')




    <div class="site-section">
        {{-- <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="icon-check_circle display-3 text-success"></span>
                        <h2 class="display-3 text-black">Thank you!</h2>
                        <p class="lead mb-5">You order was successfuly completed.</p>
                        <p><a href="/shop" class="btn btn-md height-auto px-4 py-3 btn-primary">Back to store</a>
                        </p>
                    </div>
                </div>
            </div> --}}

        {{-- New Code --}}
        <div class="order-container fade-down">
            <div class="w-[100%] flex items-center justify-around max-sm:flex-col gap-4 max-[768px]:flex-col">
                <div class="w-[65%] flex flex-col items-center gap-6 max-sm:w-[100%]">
                    <div class="order-success">
                        <img src="{{ asset('images/correct.png') }}" alt="" />
                        <p>Order Id: #123</p>
                        <h2>Thank You for Ordering</h2>
                        <p>
                            Your order was successfuly completed.
                        </p>
                    </div>
                    <div class="btn-order">
                        <a class="btn-1" href="/">View Order</a>
                        <a class="btn-2" href="/">Continue Shopping</a>
                    </div>
                </div>
                <div class="w-[35%] max-sm:w-[100%] max-[768px]:w-[70%]">
                    <div class="w-[100%] border-2 p-3 rounded-md">
                        <div class="text-[18px] font-bold">Order Details</div>
                        <div class="text-gray text-[14px] pb-2">Order Id: #123</div>
                        <div>
                            <div class="flex items-center gap-2 pb-3">
                                <div class="bg-white/75">
                                    <img src="{{ asset('images/product_01.png') }}" alt="Product Image"
                                        style="height: 80px; width: 80px;">
                                </div>
                                <div class=" w-full flex items-start justify-between">
                                    <div>
                                        <div>Product Name</div>
                                        <div>Qty: 1</div>
                                    </div>
                                    <div class="items-end">
                                        <div>Rs: 123</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Sub Total:</div>
                                <div>Rs.123.00</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Delivery:</div>
                                <div>
                                    <del>Rs.80.00</del> <span class="text-rose-500">FREE</span>
                                </div>
                            </div>

                            {{-- <div class="flex items-center justify-between border-b-2 pb-2">
                    <div>Total:</div>
                    <div>123.00</div>
                  </div> --}}
                            <div class="flex items-center justify-between border-b-2 pb-2">
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
