<?php

namespace App\Http\Livewire;

use App\Models\Orderdetail;
use Livewire\Component;
use Livewire\WithPagination;

class OrderPagination extends Component
{
    use WithPagination;

    public function render()
    {

        return view('livewire.order-pagination', [
            'orderDetails' => Orderdetail::all(),
        ]);

    }
}
