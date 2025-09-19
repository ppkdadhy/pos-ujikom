<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\products;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kasir.transaksi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = date('Y-m-d H:i:s');
        $countToday = Order::whereDate('created_at', $today)->count() + 1;
        $orderCode = 'ORD-' . date('Ymd') . '-' . str_pad($countToday, 4, '0', STR_PAD_LEFT);
        $statusOrder = "Order";
        $products = products::all();
        return view('kasir.transaksi.create', compact('today', 'orderCode', 'statusOrder', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
