<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\StockResource;
use App\Models\Dashboard;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('pages.dashboards.show', [
            'draft_invoices' => InvoiceResource::collection(
                Invoice::query()->with('services')->draft()->get()
            )->resolve(),
            'paid_invoices' => InvoiceResource::collection(
                Invoice::query()->with('services')->paid()->get()
            )->resolve(),
            'unpaid_invoices' => InvoiceResource::collection(
                Invoice::query()->with('services')->unpaid()->get()
            )->resolve(),
            'stocks' => StockResource::collection(
                Stock::query()
                    ->with(['product'])
                    ->get()
            )->resolve(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        return view('pages.dashboards.show', [
            'invoices' => Invoice::query()
                ->with(['services'])
                ->withCasts(['due_at' => 'datetime:Y-m-d'])
                ->get(),
            'products' => Product::all(),
            'stocks' => Stock::query()
                ->join('products', 'stocks.product_id', '=', 'products.id')
                ->selectRaw('stocks.quantity, stocks.price, products.name')
                ->withCasts(['price' => 'decimal:2'])
                ->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardRequest $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
