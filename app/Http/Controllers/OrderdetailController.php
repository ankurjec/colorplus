<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use App\Models\OrderdetailItem;
use App\Models\Shoppingcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $items = Shoppingcart::where('user_id', auth()->user()->id)->get();

            $total = 0;
            foreach ($items as $item) {
                $total += $item->product->price * $item->quantity;
            }

            return view('orderdetail', compact('items', 'total'));
        } else {
            return redirect('user_login');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $userId = auth()->user()->id;

        $order = new Orderdetail();
        $order->name = $request->name;
        $order->address = $request->address;
        $order->state = $request->state;
        $order->pincode = $request->pincode;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->notes = $request->notes;
        $order->user_id = $userId;

        $order->save();

        $lastId = $order->id;

        // get the items from shoppingcarts and save to orderdetail_items
        $items = Shoppingcart::where('user_id', $userId)->get();
        foreach ($items as $item) {
            $eachOrder = new OrderdetailItem();
            $eachOrder->orderdetail_id = $lastId;
            $eachOrder->product_id = $item->product_id;
            $eachOrder->product_name = $item->product->name;
            $eachOrder->product_price = $item->product->price;
            $eachOrder->product_quantity = $item->quantity;
            $eachOrder->save();
        }
        //remove items from cart
        $deleted = Shoppingcart::where('user_id', $userId)->delete();

        //return redirect()->route('cart')->with('success', 'You Order has been placed successfully.');
        return redirect('/thankyou')->with('success', 'You Order has been placed successfully.');
    }

    // public function edit(Request $request): View
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    // }

    public function myorders(Request $request)
    {
        // dd($request);

        $userId = auth()->id();

        $user = Auth::user();
        //dd($user->name);
        $orderDetails = OrderDetail::with(['orderDetailItems', 'orderDetailItems.productImage'])
            ->where('user_id', $userId)
            ->orderBy('orderdetails.created_at', 'desc')
            ->limit(1)
            ->paginate(2);
        //dd($orderDetails);
        //dd($orderDetails);
        // $orderDetails->each(function ($orderDetail) {
        //     $orderDetail->orderDetailItems = $orderDetail->orderDetailItems->unique('orderdetail_id');
        // });

        // if ($request->ajax()) {
        //     dd($request);
        //     return view('myorders', compact('orderDetails','user'));
        // }
        return view('myorders', compact('orderDetails', 'user'));
    }

    public function wishlist()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Retrieve wishlist items for the authenticated user
            $wishlistItems = $user->wishlist;

            return view('wishlist', compact('wishlistItems'));
        } else {
            dd('User is not authenticated. Redirect should happen here.');

            // User is not authenticated
            return redirect()->route('login')->with('error', 'Please log in to view your wishlist.');
        }
    }

    public function fetch_data(Request $request)
    {
        //dd($request);
        if ($request->ajax()) {
            $data = DB::table('orderdetails')->paginate(5);
            dd($data);

            return view('myorders_data', compact('data'))->render();
        }
    }

    public function paginationAjax(Request $request)
    {
        if ($request->ajax()) {
            $userId = auth()->id();

            $user = Auth::user();
            $orderDetails = OrderDetail::with(['orderDetailItems', 'orderDetailItems.productImage'])
                ->where('user_id', $userId)
                ->paginate(2);

            return view('myorders', compact('orderDetails', 'user'))->render();
        }
    }

    // public function orderbilling($orderDetailId)
    // {

    //     // $orderDetails = OrderDetail::where('id', $orderDetailId)->limit(1)->get();

    // return view('orderbilling');

    // }

    public function orderbilling($orderDetailId)
    {

        $orderDetails = OrderDetail::where('id', $orderDetailId)->get();

        //dd($orderDetails);
        return view('orderbilling', compact('orderDetails'))->with('bootstrap', true);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function thankyou()
    {
        return view('thankyou');
    }

    public function accountdata()
    {

        $userId = auth()->id();

        $user = Auth::user();

        return view('account_data', compact('user'));

    }
}
