<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;
class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::with('customer')->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }
}
