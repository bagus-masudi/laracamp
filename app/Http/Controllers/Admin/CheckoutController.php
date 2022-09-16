<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    public function update(Request $request, Checkout $checkout){
        $checkout->is_paid = true;
        $checkout->save();
        $checkouts = Checkout::with('Camp')->get();
        $request->session()->flash('success', "Checkout with Camp {$checkout->Camp->title} has been updated!");
        return redirect(route('admin.dashboard'));
    }
}
