<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = \App\Models\Customer::select('id')->get();
        $orders = \App\Models\Order::all();

        $stats = [
            'totalCustomers' => $customers->totalCustomers(),
            'summaryOrders' => $orders->summaryOrders(),
        ];

        return view('dashboard', compact('stats'));
    }
}
