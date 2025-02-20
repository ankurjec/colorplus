<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccountData extends Component
{
    public $accountData;

    public function render()
    {

        $userId = auth()->id();

        $user = Auth::user();

        $this->accountData = [
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->address,
            // Add more data as needed
        ];

        return view('livewire.account-data', compact('user', 'accountData'));
    }
}
