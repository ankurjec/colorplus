@extends('layouts.dashboard-layout')

@section('page-title', 'My Orders')

@section('dashboard-content')
    {{-- <div>
        Your Order is Empty!
    </div> --}}
    <div class="mt-2 border-2 p-4">
        <div class="flex items-center justify-between border-b-2 pb-4">
            <div class="text-[14px] font-medium">
                <div> Order Id: 0123<span class="text-green-500"> Shipped</span></div>
                <div>Date: 12 july 2023</div>
            </div>
            <div class="text-blue-500 text-[14px] "><a href="#" class="hover:text-blue-700">Order
                    Details</a></div>
        </div>
        <div class="flex items-center gap-2">
            <div>

                <img src="{{ asset('images/product_01.png') }}" alt="Product Image" style="height: 120px; width: 120px;">

            </div>
            <div>
                <div>Product Name</div>
                <div>Qty: 1</div>
                <div>Price: 123</div>
            </div>
        </div>
    </div>

    <div class="mt-2 border-2 p-4">
        <div class="flex items-center justify-between border-b-2 pb-4">
            <div class="text-[14px] font-medium">
                <div> Order Id: 0123<span class="text-green-500"> Shipped</span></div>
                <div>Date: 12 july 2023</div>
            </div>
            <div class="text-blue-500 text-[14px] "><a href="#" class="hover:text-blue-700">Order
                    Details</a></div>
        </div>
        <div class="flex items-center gap-2">
            <div>

                <img src="{{ asset('images/product_01.png') }}" alt="Product Image" style="height: 120px; width: 120px;">

            </div>
            <div>
                <div>Product Name</div>
                <div>Qty: 1</div>
                <div>Price: 123</div>
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

    <script></script>
@endsection
