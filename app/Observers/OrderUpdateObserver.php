<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;

class OrderUpdateObserver
{
    public function updated(Order $order): void
    {
        $data  = ['action' => 'updated', 'model_name' => 'Order'];
        $users = User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->except($this->auth()->user);

    }
}
