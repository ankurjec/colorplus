<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Shoppingcart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Cart extends Component
{
    public $shoppings;

    public $total = 0;

    public $deleteId;

    // public function render()
    // {
    //     // dd(auth()->user()->name);
    //     $userId = auth()->user()->id;
    //     $this->shoppings = Shoppingcart::where('user_id', $userId)->get();
    //     $this->total = 0;
    //     foreach ($this->shoppings as $item) {
    //         $this->total += $item->product->price * $item->quantity;
    //     }

    //     return view('livewire.cart');
    // }

    public function render()
    {
        if (auth()->check()) {
            // Retrieve cart items from the database for logged-in users
            $userId = auth()->user()->id;
            $this->shoppings = Shoppingcart::where('user_id', $userId)->get();
        } else {
            // Retrieve cart items from the session for non-logged-in users
            $cartItems = session('cart_items', []);

            $this->shoppings = collect($cartItems)->map(function ($cartItem) {
                $product = Product::find($cartItem['product_id']);

                return (object) [
                    'product' => $product,
                    'id' => $cartItem['product_id'], // Use the product ID as the unique identifier

                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                ];
            });
        }

        // Calculate the cart total
        $this->total = 0;
        foreach ($this->shoppings as $item) {
            if (auth()->check()) {
                // For logged-in users, fetch product price from the database
                $product = Product::find($item->product_id);
                if ($product) {
                    $this->total += $product->price * $item->quantity;
                }
            } else {

                // For non-logged-in users, fetch product price from the session (adjust as per your session data structure)
                $product = Product::find($item->product_id);
                if ($product) {
                    $this->total += $product->price * $item->quantity;
                    // dd( $product->price * $item->quantity);
                }
            }
        }

        return view('livewire.cart');
    }

    // public function incrementQty($id)
    // {
    //     $cart = Shoppingcart::find($id);
    //     $cart->quantity += 1;
    //     $cart->save();
    // }

    public function incrementQty($id)
    {
        if (auth()->check()) {
            // For logged-in users, update the quantity in the database
            $cart = Shoppingcart::find($id);
            if ($cart) {
                $cart->quantity += 1;
                $cart->save();
            }
        } else {
            // For non-logged-in users, update the quantity in the session
            $cartItems = session('cart_items', []);

            foreach ($cartItems as $key => $cartItem) {
                if ($cartItem['product_id'] == $id) {
                    $cartItems[$key]['quantity'] += 1;
                    break;
                }
            }

            session(['cart_items' => $cartItems]);
        }
    }

    public function decrementQty($id)
    {
        if (auth()->check()) {
            // For logged-in users, update the quantity in the database
            $cart = Shoppingcart::find($id);
            if ($cart) {
                $cart->quantity -= 1;
                $cart->save();
            }
        } else {
            // For non-logged-in users, update the quantity in the session
            $cartItems = session('cart_items', []);

            foreach ($cartItems as $key => $cartItem) {
                if ($cartItem['product_id'] == $id) {
                    $cartItems[$key]['quantity'] -= 1;
                    break; // Assuming the product_id is unique, we found the item, so break the loop
                }
            }

            session(['cart_items' => $cartItems]);
        }
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    // public function delete()
    // {
    //     Shoppingcart::destroy($this->deleteId);
    //     $this->emit('updateCartCount');

    //     session()->flash('message', 'Item removed successfully.');
    // }

    public function delete()
    {
        if (auth()->check()) {
            // For logged-in users, delete the item from the database
            Shoppingcart::destroy($this->deleteId);
        } else {
            // For non-logged-in users, delete the item from the session
            $cartItems = session('cart_items', []);

            $cartItems = array_filter($cartItems, function ($cartItem) {
                return $cartItem['product_id'] != $this->deleteId;
            });

            session(['cart_items' => $cartItems]);
        }

        $this->emit('updateCartCount');
        session()->flash('message', 'Item removed from cart.');
    }
}
