@extends('layouts.dashboard-layout')

@section('page-title', 'My Wishlist')

@section('css')
    @parent
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td,
        th {
            border: 1px solid lightgray;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f7f7f7;
            border: 1px solid white;
        }
    </style>
@endsection

@section('dashboard-content')
    {{-- <div>
        Your Wishlist is Empty!
    </div> --}}
    <div>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="flex items-center gap-2 max-sm:flex-col">
                            <div>
                                <img src="{{ asset('images/product_01.png') }}" alt="Product Image"
                                    style="height: 120px; width: 120px;">
                            </div>
                            <div class="max-sm:hidden">
                                <div>Product Name</div>
                                <div>Qty: 1</div>
                                <div>Price: 123</div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <button><i class="fa-solid fa-trash-can" style="font-size: 22px; color: #e55039"></i></button>&nbsp;
                        <button><i class="fa-solid fa-cart-plus" style="font-size: 22px; color: #e55039"></i></i></button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="flex items-center gap-2 max-sm:flex-col">
                            <div>

                                <img src="{{ asset('images/product_01.png') }}" alt="Product Image"
                                    style="height: 120px; width: 120px;">
                            </div>
                            <div class="max-sm:hidden">
                                <div>Product Name</div>
                                <div>Qty: 1</div>
                                <div>Price: 123</div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <button><i class="fa-solid fa-trash-can" style="font-size: 22px; color: #e55039"></i></button>&nbsp;
                        <button><i class="fa-solid fa-cart-plus" style="font-size: 22px; color: #e55039"></i></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    @livewireScripts
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
@endsection
