<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all transactions from the database
        $transactions = \App\Models\Transaction::all();
        // Pass transactions to the view (to be created later)
        return view('transactions.index', compact('transactions'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view with a form to create a new transaction
        return view('transactions.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
    
        // Create a new transaction record
        \App\Models\Transaction::create($validated);
    
        // Redirect to the transactions list with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully!');
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
    public function edit($id)
    {
        // Fetch the transaction by its ID or throw a 404 error if not found
        $transaction = \App\Models\Transaction::findOrFail($id);
        
        // Return the edit view with the transaction data
        return view('transactions.edit', compact('transaction'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
    
        // Find the existing transaction record
        $transaction = \App\Models\Transaction::findOrFail($id);
    
        // Update the transaction with new data
        $transaction->update($validated);
    
        // Redirect back with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the transaction by its ID
        $transaction = \App\Models\Transaction::findOrFail($id);
    
        // Delete the transaction record
        $transaction->delete();
    
        // Redirect back to transactions list with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }
    
}
