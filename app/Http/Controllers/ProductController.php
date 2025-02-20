<?php

namespace App\Http\Controllers;

use App\Models\NewProduct;
use App\Models\PopularProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Shoppingcart;
use App\Models\Specification;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('productCategory', 'specification', 'images')->get();
        // foreach ($products as $product) {
        //     foreach ($product->images as $image) {
        //         echo $image->url;
        //     }        }

        // dd();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image files

        ]);

        // Create a new ProductCategory instance
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $request->price;

        $product->discount_amount = $request->discount_amount;
        $product->discount_percentage = $request->discount_percentage;

        $product->details = $request->details;

        $product->product_code = $request->product_code;

        $product->description = $validatedData['description'];
        $product->category_id = $request->category_id;
        $product->product_code = $request->product_code;

        // Save the new product category to the database
        $product->save();
        // Check if the product is popular or new
        if ($request->has('isPopularProduct')) {
            // Create a new record in the "popular_products" table
            PopularProduct::create(['product_id' => $product->id]);
        }
        if ($request->has('isNewProduct')) {
            // Create a new record in the "new_products" table
            NewProduct::create(['product_id' => $product->id]);
        }

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {
                $fileName = uniqid().'.'.$image->getClientOriginalExtension();
                $path = Storage::disk('public')->putFileAs('images/products/'.$product->id, $image, $fileName);
                // $path = 'app/public/' . $path;
                $imagePath = public_path($path);
                [$width, $height] = getimagesize($imagePath);
                // dd($height);
                $product->images()->create([
                    'url' => $path,
                    'height' => $height,
                    'width' => $width,

                ]);
            }
        }

        // $specification = new Specification();
        // $specification->hpis_code = $validatedData['hpis_code'];
        // $specification->health_care_providers_only = $validatedData['health_care_providers_only'];
        // $specification->latex_free = $validatedData['latex_free'];
        // $specification->medication_route = $validatedData['medication_route'];
        // $specification->product_id = $product->id; // Associate the specification with the newly created product
        // $specification->save();

        // Redirect the user to a success page or show a success message
        return redirect()->route('product.index')->with('success', 'Product created successfully');
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
        $categories = ProductCategory::all();
        $specifications = Specification::all();
        $product = Product::with('specification')->findOrFail($id);
        // dd($product);
        $isNewProduct = $product->newProduct()->exists();
        // Check if the product is a "Popular Product"
        $isPopularProduct = $product->popularProduct()->exists();
        // dd($isPopularProduct);

        return view('product.edit', compact('product', 'categories', 'specifications', 'isNewProduct', 'isPopularProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //dd($request->images);
        //    $validatedData = $request->validate([

        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image files

        // ]);
        $product = Product::with('specification','images')->findOrFail($id);
//dd($product);
        // Update the product attributes
        $product->name = $request->input('name');
        $product->details = $request->input('details');

        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->product_code = $request->input('product_code');
        $product->price = $request->input('price');

        $product->discount_amount = $request->discount_amount;
        $product->discount_percentage = $request->discount_percentage;
        // Save the updated product
        $product->save();
        if ($request->has('isPopularProduct')) {
            // Create a new record in the "popular_products" table
            PopularProduct::create(['product_id' => $product->id]);
        } else {
            // Remove the product from the "popular_products" table
            PopularProduct::where('product_id', $product->id)->delete();
        }

        // Check if the product is marked as "New Product"
        if ($request->has('isNewProduct')) {
            // Create a new record in the "new_products" table
            NewProduct::create(['product_id' => $product->id]);
        } else {
            // Remove the product from the "new_products" table
            NewProduct::where('product_id', $product->id)->delete();
        }

         // Handle image uploads
    if ($request->has('images')) {
        $images = $request->input('images');
//dd($images);
        // Delete existing images from storage and database
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->url); // Delete from storage
            $image->delete(); // Delete from database
        }


        foreach ($images as $image) {
            $fileName = uniqid().'.'.$image->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('images/products/'.$product->id, $image, $fileName);
            // $path = 'app/public/' . $path;
            $imagePath = public_path($path);
            [$width, $height] = getimagesize($imagePath);
            // dd($height);
            $product->images()->create([
                'url' => $path,
                'height' => $height,
                'width' => $width,

            ]);
        }




        
    }

        return redirect()->route('product.index');
    }

//     public function update(Request $request, $id)
// {

//     dd($request);
//     // Validate the request data
//     $validatedData = $request->validate([
//         'name' => 'required',
//         'description' => 'required',
//         'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image files
//     ]);

//     // Find the existing product by ID
//     $product = Product::findOrFail($id);

//     // Update the product properties
//     $product->name = $validatedData['name'];
//     $product->price = $request->price;
//     $product->product_code = $request->product_code;
//     $product->description = $validatedData['description'];
//     $product->category_id = $request->category_id;
//     $product->product_code = $request->product_code;

//     // Save the updated product to the database
//     $product->save();

//     // Check if the product is popular or new
//     if ($request->has('isPopularProduct')) {
//         // Check if the product is already marked as popular
//         if (!$product->popularProduct) {
//             // Create a new record in the "popular_products" table
//             PopularProduct::create(['product_id' => $product->id]);
//         }
//     } else {
//         // If the product is not marked as popular, delete the existing record
//         if ($product->popularProduct) {
//             $product->popularProduct->delete();
//         }
//     }

//     if ($request->has('isNewProduct')) {
//         // Check if the product is already marked as new
//         if (!$product->newProduct) {
//             // Create a new record in the "new_products" table
//             NewProduct::create(['product_id' => $product->id]);
//         }
//     } else {
//         // If the product is not marked as new, delete the existing record
//         if ($product->newProduct) {
//             $product->newProduct->delete();
//         }
//     }

//     if ($request->hasFile('images')) {
//         $images = $request->file('images');

//         foreach ($images as $image) {
//             $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
//             $path = Storage::disk('public')->putFileAs('images/products/' . $product->id, $image, $fileName);

//             $imagePath = public_path($path);
//             list($width, $height) = getimagesize($imagePath);

//             // Create a new image record or update an existing one
//             $product->images()->updateOrCreate(
//                 ['url' => $path],
//                 ['height' => $height, 'width' => $width]
//             );
//         }
//     }

//     return redirect()->route('product.index')->with('success', 'Product updated successfully');
// }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del_product = Product::findOrFail($id);

        //  dd($del_product->images);

        ProductImage::where('product_id', $id)->delete();

        foreach ($del_product->images as $image) {
            Storage::delete($image->url);
        }
        Shoppingcart::where('product_id', $id)->delete();
        $del_product->delete();

        return redirect()->route('product.index');
    }

    public function search(Request $request)
    {
        $search_item = $request->input('search_item');

        $products = Product::where('name', 'like', '%'.$search_item.'%')
            ->orWhere('description', 'like', '%'.$search_item.'%')
            ->get();

        //  $products = DB::select("SELECT * FROM products WHERE MATCH(name, description) AGAINST (? IN NATURAL LANGUAGE MODE)", [$search_item]);
        //  $products = Product::hydrate($products);

        // dd($products);
        // Return the search results to a view
        return view('search_results', ['products' => $products]);
    }

    public function productsfilter(Request $request)
    {

        $filterType = $request->filter_type;
        //  dd( $filterType);
        $products = $this->filterProducts($filterType);

        return view('shop', compact('products', 'filterType'));

    }

    private function filterProducts($filterType)
    {
        $query = Product::query();
        //dd($query);
        switch ($filterType) {
            case 'name_az':
                $query->orderBy('name', 'asc');
                break;
            case 'name_za':
                $query->orderBy('name', 'desc');
                break;
            case 'price_low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;

            default:

                $query->latest();
                break;
        }

        return $query->get();
    }
}
