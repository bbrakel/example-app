<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
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
        $draftInvoices = Invoice::query()->draft()->get();
        $overdueInvoices = Invoice::query()->overdue()->get();
        $stocks = Stock::query()->available()->get();

        return view('pages.dashboards.show', [
            'draft_invoices' => $draftInvoices->toArray(),
            'overdue_invoices' => $overdueInvoices->toArray(),
            'stocks' => $stocks->toArray(),
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
