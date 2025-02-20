@extends('layouts.site-header')

@section('css')
    @parent
    {{-- <style>
        .btn-placeorder {
            color: #FFF;
            background-color: #459968;
            border-color: #278850;
        }

        .btn.btn-placeorder:hover {
            background-color: #51eaea;
            /* Change the background color on hover */
        }

        /* New Design CSS Code */
        .order-container {
            padding: 0% 8% 0%;
        }

        .order-details-payment {
            display: flex;
            gap: 4%;
            width: 100%;
        }

        .billing-details {
            width: 49%;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            height: auto;
            padding: 50px;
            border-radius: 10px;
        }

        .checkout-details {
            width: 49%;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            height: auto;
            padding: 40px;
            border-radius: 10px;
        }

        .billing-form {
            margin: 0 auto;
            padding-top: 20px;
        }

        label {
            font-weight: 500;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .name {
            display: flex;
            justify-content: space-between;
        }

        .first-name,
        .last-name {
            flex-basis: 49%;
        }

        .email {
            flex-basis: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border-bottom: 1px solid lightgray;
            padding: 14px;
            text-align: left;
        }

        thead {
            border-bottom: 3px solid gray;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
            height: 100px;
            /* Adjust as needed */
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        .radio-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .radio-container label {
            margin-left: 5px;
        }

        .radio-container input {
            width: auto;
            margin: auto 0;
        }

        .payment-method h3 {
            margin: 20px 0px;
        }

        button {
            width: 100%;
            padding: 10px 16px;
            margin-top: 20px;
            background-color: #e55039;
            border: none;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #b53c29;
        }

        .header-login {
            background-color: rgb(245, 245, 245);
            padding: 18px 0px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .header-login h3 {
            font-size: 18px;
            margin-left: 20px;
            margin: auto 20px;
        }
        @media only screen and (max-width:600px){
            .order-details-payment{
                flex-direction: column;
            }
            .billing-details{
                width: 100%;
                padding: 20px;
                margin-bottom: 20px;
            }
            .checkout-details{
                width: 100%;
                padding: 20px;
            }
        }
    </style> --}}

    <style>
        .dropdwn{
            padding: 4px 8px;
            border: 1px solid rgb(240, 240, 240);
        }
    </style>
@endsection



@section('page-title', 'Checkout')
@section('content')



    <div class="site-section">

        {{-- Old Code --}}
        {{-- <div class="order-container">
            <div class="header-login">
                <h3>Returning customer? <a href="/user_login">Click here</a> to login</h3>
            </div>
            <form action="{{ route('orderdetail.store') }}" method="post">
               @csrf
                <div class="order-details-payment">
                    <div class="billing-details">
                        <h3>Billing Details</h3>
                        <div class="billing-form">
                            <div class="name">
                                <div class="first-name">
                                    <label for="first_name">First Name</label><br />
                                    <input type="text" id="first_name" name="first_name" />
                                </div>
                                <div class="last-name">
                                    <label for="last_name">Last Name</label><br />
                                    <input type="text" id="last_name" name="last_name" />
                                </div>
                            </div>
                            <div class="name">
                                <div class="email">
                                    <label for="address">Address</label><br />
                                    <textarea id="address" name="address" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="name">
                                <div class="first-name">
                                    <label for="state">State</label><br />
                                    <input type="text" id="state" name="state" />
                                </div>
                                <div class="last-name">
                                    <label for="pincode">Pincode</label><br />
                                    <input type="text" id="pincode" name="pincode" />
                                </div>
                            </div>
                            <div class="name">
                                <div class="first-name">
                                    <label for="email">Email</label><br />
                                    <input type="text" id="email" name="email" />
                                </div>
                                <div class="last-name">
                                    <label for="phone">Phone</label><br />
                                    <input type="text" id="phone" name="phone" placeholder="Phone Number" />
                                </div>
                            </div>
                            <div class="name">
                                <div class="email">
                                    <label for="order_notes">Order Notes</label><br />
                                    <textarea id="order_notes" name="order_notes" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-details">
                        <h3>Checkout Details</h3>
                        <div>
                            <table>
                                <thead>
                                    <th>Product</th>
                                    <th class="text-center">Total</th>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->product->name }} <strong class="mx-2">x</strong>
                                                {{ $item->quantity }}</td>
                                            <td class="text-right">
                                                Rs.{{ number_format($item->product->price * $item->quantity, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Cart
                                                Subtotal</strong>
                                        </td>
                                        <td class="text-black text-right">Rs.{{ number_format($total, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Order Total</strong>
                                        </td>
                                        <td class="text-black font-weight-bold text-right">
                                            <strong>Rs.{{ number_format($total, 2) }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="payment-method">
                            <h3>Payment Method</h3>
                            <div class="radio-container">
                                <input type="radio">
                                <label for=""> Cash On Delivery</label>
                            </div>
                        </div>
                        <div class="radio-container">
                            <input type="radio" id="net-card-payment" name="payment-method" value="net-card-payment" />
                            <label for="net-card-payment">Net Banking/Card Payment</label>
                        </div>
                        <button type="submit" class="btn-placed">Placed Order</button>
                    </div>
                </div>
            </form>
        </div> --}}


        {{-- New Code --}}
        <div class="px-[8%] py-[5%] w-[100vw]">
            <!-- Checkout Page Card Design -->
            <div class="text-2xl font-bold">Checkout</div>
            <div class="flex max-sm:flex-col gap-4 w-full h-auto mt-6">
              <div class="w-[65vw] h-auto max-sm:w-[100%] p-[20px]">
                <!-- Delivery Address -->
                <div class="border-b-2 pb-4">
                  <div class="flex justify-between">
                    <div class="font-bold">1. Delivery Address</div>
                    <div class="flex flex-col text-gray-700 leading-5 gap-1">
                      Agro Zenith Sciences<br />505, Block-5, Srping Valley, Guwahati,
                      Assam 781013
                      <span
                        class="text-blue-600 cursor-pointer"
                        id="delivery-instructions"
                        >Add delivery instructions</span
                      >
                    </div>
                    <div class="text-blue-600 font-semibold">
                      <button id="change-button">Change</button>
                    </div>
                  </div>
                  <!-- Multi Address -->
                  <div class="hidden" id="address-list">
                    <div class="mt-4">
                      <label class="inline-flex items-center gap-4">
                        <input
                          type="radio"
                          class="form-radio h-5 w-5 text-blue-600"
                          name="address"
                          value="address1"
                        />
                        <div class="flex flex-col text-gray-700 leading-5 gap-1">
                          Agro Zenith Sciences<br />505, Block-5, Srping Valley,
                          Guwahati, Assam 781013
                          <div class="flex gap-2">
                            <span
                              class="text-blue-600 cursor-pointer"
                              >Edit Address</span
                            >
                            <span
                              class="text-blue-600 cursor-pointer"
                              id="delivery-instructions"
                              >Add delivery instructions</span
                            >
                          </div>
                        </div>
                      </label>
                    </div>
                    <div class="mt-4">
                      <label class="inline-flex items-center gap-4">
                        <input
                          type="radio"
                          class="form-radio h-5 w-5 text-blue-600"
                          name="address"
                          value="address2"
                        />
                        <div class="flex flex-col text-gray-700 leading-5 gap-1">
                          Agro Zenith Sciences<br />505, Block-5, Srping Valley,
                          Guwahati, Assam 781013
                          <div class="flex gap-2">
                            <span
                              class="text-blue-600 cursor-pointer"
                              >Edit Address</span
                            >
                            <span
                              class="text-blue-600 cursor-pointer"
                              id="delivery-instructions"
                              >Add delivery instructions</span
                            >
                          </div>
                        </div>
                      </label>
                    </div>
                    <div class="mt-4">
                      <label class="inline-flex items-center gap-4">
                        <input
                          type="radio"
                          class="form-radio h-5 w-5 text-blue-600"
                          name="address"
                          value="address3"
                        />
                        <div class="flex flex-col text-gray-700 leading-5 gap-1">
                          Agro Zenith Sciences<br />505, Block-5, Srping Valley,
                          Guwahati, Assam 781013
                          <div class="flex gap-2">
                            <span
                              class="text-blue-600 cursor-pointer"
                              >Edit Address</span
                            >
                            <span
                              class="text-blue-600 cursor-pointer"
                              id="delivery-instructions"
                              >Add delivery instructions</span
                            >
                          </div>
                        </div>
                      </label>
                    </div>
                    <div class="mt-4">
                      <button
                        class="text-[16px] font-bold text-blue-600 cursor-pointer" id="add-address"
                      >
                        Add New Address
                      </button>
                    </div>
                  </div>
      
      
                  <!-- Add New Address Popup -->
                  <!-- Model Popup -->
                    <div
                      id="modal-overlay"
                      class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50"
                    >
                      <div
                        id="coordination-details"
                        class="bg-white p-8 rounded-lg shadow-lg w-[50vw] max-sm:w-[80vw] max-h-[90vh] overflow-y-auto"
                      >
                        <div class="modal-content border-0">
                         <div class="text-2xl font-semibold">Add New Address</div>
                         <div class="my-2 flex flex-col">
                          <label for="country" class="font-medium">Country/Region</label>
                          <select name="" id="" class="py-[4px] px-[4px] border-2 my-2 dropdwn">
                            <option value="">India</option>
                            <option value="">USA</option>
                            <option value="">UK</option>
                            <option value="">China</option>
                          </select>
                         </div>
                         <div class="my-2 flex flex-col">
                          <label for="name" class="font-medium">Full Name (First and Last Name)</label>
                          <input type="text" class="py-[4px] px-[4px] border-2">
                         </div>
                         <div class="my-2 flex flex-col">
                          <label for="street" class="font-medium">Street Number</label>
                          <input type="text" class="py-[4px] px-[4px] border-2" placeholder="Street Number, P.O Box, Company Name, C/O">
                          <input type="text" class="py-[4px] px-[4px] border-2 mt-[5px]" placeholder="Apartment, suit, building, floor, etc">
                         </div>
                         <div class="my-2 flex flex-col">
                          <label for="city" class="font-medium">City</label>
                          <input type="text" class="py-[4px] px-[4px] border-2">
                         </div>
                         <div class="my-2 flex flex-col">
                          <label for="state" class="font-medium">State / Province / Region</label>
                          <input type="text" class="py-[4px] px-[4px] border-2">
                         </div>
                         <div class="my-2 flex flex-col">
                          <label for="pincode" class="font-medium">Pincode</label>
                          <input type="text" class="py-[4px] px-[4px] border-2">
                         </div>
                         <div class="my-2 flex flex-col">
                          <label for="phone" class="font-medium">Phone Number</label>
                          <input type="text" class="py-[4px] px-[4px] border-2">
                          <span class="text-[12px] text-gray-300">May be used to assist delivery</span>
                         </div>
                         <div class="my-4 flex gap-2 items-center">
                          <input type="checkbox"><label for="checkbox">Use as my default address.</label>
                         </div>
                        </div>
                        <button
                          id="close-modal"
                          class="text-[16px] px-2 py-1 border-2 outline-none"
                        >
                          Close
                        </button>
                        <button
                        class="text-[16px] px-2 py-1 cursor-pointer bg-[#e55039] hover:bg-[#b53c29] text-white rounded-sm"
                      >
                        Use this address
                      </button>
                      </div>
                    </div>
                </div>
      
                <!-- Payment Method -->
                <div class="border-b-2 py-4">
                  <div class="flex justify-between">
                    <div class="font-bold">2. Payment Method</div>
                    <div class="flex justify-start w-[48%] max-sm:w-[100%]">
                      Pay on delivery (Cash/Card)
                    </div>
                    <div class="text-blue-600 font-semibold">
                      <button id="payment-btn">Change</button>
                    </div>
                  </div>
      
      
      
                  <!-- Payment Accordination -->
                  <div class="hidden" id="payment-list">
                    <div class="mt-4">
                      <label class="inline-flex items-center gap-4">
                        <input
                          type="radio"
                          class="form-radio h-5 w-5 text-blue-600"
                          name="payment"
                          value="payment1"
                        />
                        <div>Credit & Debit Card</div>
                      </label>
                    </div>
                    <div class="mt-4">
                      <label class="inline-flex items-center gap-4">
                        <input
                          type="radio"
                          class="form-radio h-5 w-5 text-blue-600"
                          name="payment"
                          value="payment1"
                        />
                        <div>
                          <div>Net Banking</div>
                          <select name="" id="" class="p-[5px] border-2 mt-2">
                            <option value="">Choose an Option</option>
                            <option value="">HDFC Bank</option>
                            <option value="">KOTAK BANK</option>
                            <option value="">AU BANK</option>
                          </select>
                        </div>
                      </label>
                    </div>
                    <div class="mt-4">
                      <label class="inline-flex items-center gap-4">
                        <input
                          type="radio"
                          class="form-radio h-5 w-5 text-blue-600"
                          name="payment"
                          value="payment1"
                        />
                        <div>Cash on delivery</div>
                      </label>
                    </div>
                    <div class="mt-4">
                      <button
                        class="text-[16px] px-2 py-1 cursor-pointer bg-[#e55039] hover:bg-[#b53c29] text-white rounded-lg"
                      >
                        Use this payment method
                      </button>
                    </div>
                  </div>
                </div>
              </div>
      
      
              <!-- Placed Order Card Design -->
              <div
                class="w-[24vw] h-auto max-sm:w-[100%] rounded-lg p-[20px] border-2"
              >
                <div>
                  <div
                    class="px-4 py-2 bg-[#e55039] hover:bg-[#b53c29] text-white cursor-pointer rounded-lg text-center font-semibold "
                  >
                    <button>Placed Order</button>
                  </div>
                  <div class="text-center mt-2 pb-4 border-b-2">
                    By placing your order, you agree to
                    <span class="font-medium">Zenith Agro Science's</span>
                    <a
                      class="text-blue-600 cursor-pointer hover:text-blue-800"
                      href="/"
                      >privacy notice</a
                    >
                    and
                    <a
                      class="text-blue-600 cursor-pointer hover:text-blue-800"
                      href="/"
                      >conditions of use.</a
                    >
                  </div>
                  <div>
                    <div class="text-[18px] font-bold py-2">Order Summary</div>
                    <div>
                      <div class="flex items-center justify-between">
                        <div>Items:</div>
                        <div>{{ number_format($total, 2) }}</div>
                      </div>
                      <div class="flex items-center justify-between">
                        <div>Delivery:</div>
                        <div>
                          <del>$80</del> <span class="text-rose-500">FREE</span>
                        </div>
                      </div>
                      <div class="flex items-center justify-between border-b-2 pb-2">
                        <div>Total:</div>
                        <div>{{ number_format($total, 2) }}</div>
                      </div>
                      <div class="flex items-center justify-between">
                        <div class="font-bold">Order Total:</div>
                        <div class="font-bold">{{ number_format($total, 2) }}</div>
                      </div>
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


        // Model Popup JS Code
    document
      .getElementById("add-address")
      .addEventListener("click", function () {
        document.getElementById("modal-overlay").classList.remove("hidden");
      });

    document
      .getElementById("close-modal")
      .addEventListener("click", function () {
        document.getElementById("modal-overlay").classList.add("hidden");
      });

    // Accodination for multi address
    document
      .getElementById("change-button")
      .addEventListener("click", function () {
        var addressList = document.getElementById("address-list");
        addressList.classList.toggle("hidden");
        var changeButton = document.getElementById("change-button");
        if (addressList.classList.contains("hidden")) {
          changeButton.textContent = "Change";
        } else {
          changeButton.textContent = "Close";
        }
      });
    document
      .getElementById("payment-btn")
      .addEventListener("click", function () {
        var addressList = document.getElementById("payment-list");
        addressList.classList.toggle("hidden");
        var changeButton = document.getElementById("payment-btn");
        if (addressList.classList.contains("hidden")) {
          changeButton.textContent = "Change";
        } else {
          changeButton.textContent = "Close";
        }
      });
    </script>
@endsection
