<?php

namespace App\Http\Livewire\Office;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateOrder extends Component
{

    public $modal = false;

    public function pagar()
    {
        $this->modal = true;
    }


    public function save_sale()
    {
        $user = Auth::user();
        Order::create([
            'user_id' => $user->id,
            'app' => 'principal',
            'costo_total' => 15.00,
            'iva' => 0,
            'sub_total' => 15.00,
            'pts' => 2.5,
            'content' => [
                'producto' => 'rifa solidaria',
            ],
        ]);

        return redirect()->to('order');
    }

    public function render()
    {
        return view('livewire.office.create-order');
    }
}
