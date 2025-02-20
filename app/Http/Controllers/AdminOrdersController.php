<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::with(['orderDetailItems', 'orderDetailItems.productImage'])
        //->where('user_id', $userId)
            ->get();

        //dd($orderDetails);
        return view('admin.orders.index', compact('orderDetails'));
    }

    public function dashboard()
    {

        Log::info('Dashboard function accessed by user', ['user_id' => auth()->id()]);


        $order_count = OrderDetail::where('status', '!=', 2)->count();

        return view('dashboard', compact('order_count'));

    }

    public function orderedit(Request $request, $id)
    {
        //dd($id);
        $orderDetail = OrderDetail::find($id);

        if ($orderDetail) {
            $orderDetail->status = $request->status;
            $orderDetail->courier_name = $request->courier_name;
            $orderDetail->tracking_id = $request->tracking_id;
            $orderDetail->tracking_url = $request->tracking_url;

            $orderDetail->save();

            // Success message or further processing
            return redirect()->back()->with('success', 'Status Updated Successfully!');
        }

        // Error handling for invalid order ID
        return response()->json(['message' => 'Invalid order ID'], 404);
    }
}
