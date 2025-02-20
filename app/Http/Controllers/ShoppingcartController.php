<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shoppingcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ShoppingcartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     if (auth()->check()) {
    //         $shoppings = Shoppingcart::where('user_id', auth()->user()->id)->get();

    //         return view('cart', compact('shoppings'));
    //     } else {
    //         return redirect('shop');
    //     }
    // }

    public function index()
    {

        if (auth()->check()) {
            // Retrieve cart items from the database for logged-in users
            $shoppings = Shoppingcart::where('user_id', auth()->user()->id)->get();

        // dd($shoppings);
        // $this->saveSessionProductsToDatabase();

        } else {
            // Retrieve cart items from the session for non-logged-in users
            $cartItems = session('cart_items', []);
            $productIds = array_column($cartItems, 'product_id');
            $shoppings = collect($productIds)->map(function ($productId) {
                return (object) ['product_id' => $productId];

            });
        }

        return view('cart', compact('shoppings'));
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
    // public function store(Request $request)
    // {
    //     //dd($request->product_id);
    //     //dd($request->product_price);

    //     if (auth()->check()) {
    //         $userId = auth()->user()->id;

    //         $shopping = new Shoppingcart();
    //         $shopping->quantity = $request->quantity;
    //         $shopping->product_id = $request->product_id;
    //         $shopping->user_id = $userId;

    //         $shopping->save();

    //         return redirect()->route('cart')->with('success', 'Product Added to Cart');
    //     } else {
    //         return back();
    //     }
    // }

    //     public function store(Request $request)
    // {
    //     if (auth()->check()) {
    //         // Store cart items in the database for logged-in users
    //         $userId = auth()->user()->id;

    //         $shopping = new Shoppingcart();
    //         $shopping->quantity = $request->quantity;
    //         $shopping->product_id = $request->product_id;
    //         $shopping->user_id = $userId;

    //         $shopping->save();

    //         return redirect()->route('cart')->with('success', 'Product Added to Cart');
    //     } else {
    //         // Store cart items in the session for non-logged-in users
    //         $cartItems = session('cart_items', []);
    //         dd($cartItems);
    //         $cartItems[] = [
    //             'product_id' => $request->product_id,
    //             'quantity' => $request->quantity,
    //         ];
    //         session(['cart_items' => $cartItems]);

    //         return back()->with('success', 'Product Added to Cart');
    //     }
    // }

    public function store(Request $request)
    {
        if (auth()->check()) {
            // Store cart items in the database for logged-in users
            $userId = auth()->user()->id;

            $shopping = new Shoppingcart();
            $shopping->quantity = $request->quantity;
            $shopping->product_id = $request->product_id;
            $shopping->user_id = $userId;

            $shopping->save();

            return redirect()->route('cart')->with('success', 'Product Added to Cart');
        } else {
            // Store cart items in the session for non-logged-in users
            $cartItems = session('cart_items', []);

            $cartItems[] = [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ];
            session(['cart_items' => $cartItems]);

            return back()->with('success', 'Product Added to Cart');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Shoppingcart $shoppingcart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shoppingcart $shoppingcart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shoppingcart $shoppingcart)
    {
        //
    }

    public function update_cart(Request $request)
    {
        if (isset($request->continue)) {
            return Redirect::to('shop');
        }
    }

    //     public function update_cart(Request $request)
    // {
    //     if (Auth::check()) {
    //         // If the user is logged in and clicked "continue", redirect to the shop route
    //         if (isset($request->continue)) {
    //             return redirect()->route('shop');
    //         }
    //     } else {
    //         // If the user is not logged in and clicked "continue", redirect to the ShoppingcartController index
    //             return redirect()->route([ShoppingcartController::class, 'index']);

    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shoppingcart $shoppingcart)
    {
        //
    }
}
