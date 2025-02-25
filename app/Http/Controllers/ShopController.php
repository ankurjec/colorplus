<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Shoppingcart;
use App\Models\ProductDesign;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $productAlreadyInCart = false;
        $popular_products = Product::with('productCategory', 'images')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('popular_products')
                    ->whereRaw('popular_products.product_id = products.id');
            })
            ->orderBy('created_at', 'desc') // Order by the 'created_at' column in descending order
            ->get();

        $new_products = Product::with('productCategory', 'images')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('new_products')
                    ->whereRaw('new_products.product_id = products.id');
            })
            ->get();

        return view('welcome', compact('new_products', 'popular_products', 'productAlreadyInCart'));

    }

   public function shop()
   {
       $products = Product::with('productCategory', 'specification', 'images')->latest()->get();
       $categories = ProductCategory::all();
       // dd($products);
       return view('shop', compact('products', 'categories'));

   }


   public function create(){
    return view('shop.shopsingle');
   }

   public function store(Request $request)
   {
       // dd($request);  // ❌ Comment or remove this line
   
       $request->validate([
           'design' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure correct file type and size
       ]);
   
       if ($request->hasFile('design')) {
           $path = $request->file('design')->store('product_designs', 'public'); // Save in `storage/app/public/product_designs/`
   
           // Store in the database
           $design = new ProductDesign();
           $design->user_id = 1; // For now, setting user_id as 1
           $design->image_path = $path; // Save the file path
           $design->save();
   
           return response()->json([
               'message' => 'Design saved successfully!',
               'path' => asset('storage/' . $path)
           ]);
       }
   
       return response()->json(['error' => 'File not uploaded'], 400);
   }
   

//    public function store(Request $request)
//    {
//        $request->validate([
//            'design' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure correct file type and size
//        ]);
   
//        if ($request->hasFile('design')) {
//            $path = $request->file('design')->store('product_designs', 'public'); // Save in `storage/app/public/tshirt_designs/`
   
//            $design = new ProductDesign();
//            $design->user_id = 1; 
//            $design->image_path = $path;
//            $design->save();
   
//            return response()->json(['message' => 'Design saved successfully!', 'path' => $path]);
//        }
   
//        return response()->json(['error' => 'File not uploaded'], 400);
//    }
   





//    public function shopsingle($productID)
//    {
//        // Retrieve the product details
//        $productDetails = Product::with('images')->where('id', $productID)->first();

//        $cartItems = Shoppingcart::all();

//        $productAlreadyInCart = false;
//        foreach ($cartItems as $cartItem) {
//            if ($cartItem->product_id == $productID) {
//                $productAlreadyInCart = true;
//                break;
//            }
//        }
//    //dd($cartItems);
//        return view('shop-single', compact('productDetails', 'productAlreadyInCart'));
//    }

// public function shopsingle($productID)
// {
//     // Retrieve the product details
//     $productDetails = Product::with('images')->where('id', $productID)->first();
//     // Get the authenticated user if available
//     $user = Auth::user();

//     $productAlreadyInCart = false;

//     if ($user) {
//         // Retrieve the user's shopping cart items if the user is logged in
//         $cartItems = Shoppingcart::where('user_id', $user->id)->get();

//         // Check if the product is already in the user's shopping cart
//         foreach ($cartItems as $cartItem) {
//             if ($cartItem->product_id == $productID) {
//                 $productAlreadyInCart = true;
//                 break;
//             }
//         }
//     }

//     return view('shop-single', compact('productDetails', 'productAlreadyInCart'));
// }

public function shopsingle($productID)
{
    $productDetails = Product::with('images')->where('id', $productID)->first();

    $user = Auth::user();
    $productAlreadyInCart = false;

    if ($user) {
        // Check if the product is in the user's shopping cart from the database
        $cartItems = Shoppingcart::where('user_id', $user->id)->get();

        foreach ($cartItems as $cartItem) {
            if ($cartItem->product_id == $productID) {
                $productAlreadyInCart = true;
                break;
            }
        }
    }

    // Check if the product is in the shopping cart session
    $cartItemsSession = session('cart_items', []);

    foreach ($cartItemsSession as $item) {
        if ($item['product_id'] == $productID) {
            $productAlreadyInCart = true;
            break;
        }
    }

    return view('shop-single', compact('productDetails', 'productAlreadyInCart'));
}
}
