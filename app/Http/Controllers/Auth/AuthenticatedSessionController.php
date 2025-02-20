<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Product;
use App\Models\Shoppingcart;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function sitelogin(Request $request)
    {
        return view('site_login.signup');
    }

    // public function sitestore(Request $request)
    // {

    //     // dd($request);
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         // Authentication successful
    //         // return redirect()->intended(RouteServiceProvider::HOME);
    //         return redirect()->route('index');
    //     } else {
    //         // Authentication failed
    //         return redirect()->back()->with('error', 'Invalid credentials');
    //     }
    // }

    public function sitestore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication successful
            $user = auth()->user();

            if (auth()->user()->is_admin == 1) {
                // return view('dashboard');

                // return redirect->('/dashboard');
                return redirect()->route('dashboard');

            } elseif (auth()->user()->is_admin == 0) {

                $previousUrl = $request->headers->get('referer'); // Get the previous URL
                $cartPageUrl = url('/cart'); // URL of the cart page

                if ($previousUrl === $cartPageUrl) {
                    $request->session()->regenerate();
                    // If the user is coming from the cart page, redirect to the cart page
                    $this->saveSessionProductsToDatabase();

                    return redirect()->route('cart'); // Adjust the route name for your cart page
                } else {

                    $request->session()->regenerate();
                    $popular_products = Product::with('productCategory', 'images')
                        ->whereExists(function ($query) {
                            $query->select(DB::raw(1))
                                ->from('popular_products')
                                ->whereRaw('popular_products.product_id = products.id');
                        })
                        ->get();

                    $new_products = Product::with('productCategory', 'images')
                        ->whereExists(function ($query) {
                            $query->select(DB::raw(1))
                                ->from('new_products')
                                ->whereRaw('new_products.product_id = products.id');
                        })
                        ->get();
                    $this->saveSessionProductsToDatabase();

                    return view('welcome', compact('new_products', 'popular_products'));
                }
            } else {
                return redirect()->route('login')
                    ->with('error', 'Email-Address And Password Are Wrong.');
            }

        }

        // If the authentication fails, show an error message
        return back()->with('error', 'Whoops! Invalid email and password.');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        auth()->login($user);
        session()->flash('success', 'You are logged in.');

        return redirect()->route('welcome')->with('success', 'You are logged in!!');
    }

    private function saveSessionProductsToDatabase()
    {
        $cartItems = session('cart_items', []);
        $userId = auth()->user()->id;

        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem['product_id']);
            if ($product) {
                $existingCartItem = Shoppingcart::where('user_id', $userId)
                    ->where('product_id', $cartItem['product_id'])
                    ->first();

                if ($existingCartItem) {
                    // Update the quantity if the item already exists in the database
                    $existingCartItem->quantity += $cartItem['quantity'];
                    $existingCartItem->save();
                } else {
                    // Create a new entry in the database if the item doesn't exist
                    Shoppingcart::create([
                        'user_id' => $userId,
                        'product_id' => $cartItem['product_id'],
                        'quantity' => $cartItem['quantity'],
                    ]);
                }
            }
        }

        // Clear the cart items from the session after saving to the database
        session()->forget('cart_items');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function sitelogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
