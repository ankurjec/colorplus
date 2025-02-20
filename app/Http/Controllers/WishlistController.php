<?php

/// app/Http/Controllers/WishlistController.php
// app\Http\Controllers\WishlistController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $wishlist = $user->wishlist;

        return view('wishlist.index', compact('wishlist'));
    }

    /**
     * Add a product to the wishlist.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function addToWishlist(Request $request)
    {
        // dd($request);
        // Retrieve productId from the request
        $productId = $request->input('productId');

        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the product is not already in the wishlist
            if (! $user->wishlist()->where('product_id', $productId)->exists()) {
                // Add product to wishlist
                $wishlistItem = Wishlist::create([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                ]);

                return redirect()->back()->with('success', 'Product added to wishlist!');
            } else {
                return redirect()->back()->with('error', 'Product is already in the wishlist.');
            }
        } else {
            // Redirect to login or handle as needed for guests
            return redirect()->back()->with('error', 'Please log in to add to wishlist.');
        }
    }

    /**
     * Remove a product from the wishlist.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function removeFromWishlist($productId)
    {
        $user = Auth::user();
        $wishlistItem = Wishlist::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();

            return redirect()->back()->with('success', 'Product removed from wishlist!');
        }

        return redirect()->back()->with('error', 'Product not found in wishlist!');
    }

    public function toggleWishlist(Request $request)
    {
        // Retrieve productId from the request
        $productId = $request->input('productId');

        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the product is already in the wishlist
            $wishlistItem = $user->wishlist()->where('product_id', $productId)->first();

            if ($wishlistItem) {
                // Product is in the wishlist, so remove it
                $wishlistItem->delete();

                return response()->json(['success' => true, 'message' => 'Product removed from wishlist.']);
            } else {
                // Product is not in the wishlist, so add it
                Wishlist::create([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                ]);

                return response()->json(['success' => true, 'message' => 'Product added to wishlist.']);
            }
        } else {
            // User is not authenticated
            return response()->json(['success' => false, 'message' => 'Please log in to add to wishlist.'], 401);
        }
    }
}
