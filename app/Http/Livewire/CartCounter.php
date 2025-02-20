<?php

namespace App\Http\Livewire;

use App\Models\Shoppingcart;
use Livewire\Component;

class CartCounter extends Component
{
    public $cartCount = 0;

    protected $listeners = ['updateCartCount' => 'countCartItems'];

    public function render()
    {
        $this->countCartItems();

        return view('livewire.cart-counter');
    }

    // public function countCartItems()
    // {
    //     if (auth()->check()) {
    //         $this->cartCount = Shoppingcart::where('user_id', auth()->user()->id)
    //             ->count();
    //     }
    // }

    public function countCartItems()
    {
        if (auth()->check()) {
            $this->cartCount = Shoppingcart::where('user_id', auth()->user()->id)->count();
        } else {
            $cartItems = session('cart_items', []);
            $this->cartCount = count($cartItems);
        }
    }
}
