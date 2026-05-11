<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::all();

        return view('policies.index', compact('policies'));
    }

    public function create()
    {
        return view('policies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'policy_name' => 'required|string|max:255',
            'description' => 'required|string',
            'premium' => 'required|numeric',
            'coverage_details' => 'required|string',
            'payment_due_date' => 'required|date',
        ]);

        Policy::create([
            'policy_name' => $request->policy_name,
            'description' => $request->description,
            'premium' => $request->premium,
            'coverage_details' => $request->coverage_details,
            'payment_due_date' => $request->payment_due_date,
        ]);

        return redirect()->route('policies.index')->with('success', 'Policy created successfully.');
    }

    public function edit($id)
    {
        $policy = Policy::findOrFail($id);

        return view('policies.edit', compact('policy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'policy_name' => 'required|string|max:255',
            'description' => 'required|string',
            'premium' => 'required|numeric',
            'coverage_details' => 'required|string',
            'payment_due_date' => 'required|date',
        ]);

        $policy = Policy::findOrFail($id);
        $policy->update($request->all());

        return redirect()->route('policies.index')->with('success', 'Policy updated successfully.');
    }

    public function destroy($id)
    {
        $policy = Policy::findOrFail($id);
        $policy->delete();

        return redirect()->route('policies.index')->with('success', 'Policy deleted successfully.');
    }

    public function downloadReceipt($id)
    {
        $policy = Policy::findOrFail($id);

        // Generate a simple receipt content
        $receiptContent = "Policy Receipt" . "<br>";
        $receiptContent .= "Policy Name: " . $policy->policy_name . "<br>";
        $receiptContent .= "Description: " . $policy->description . "<br>";
        $receiptContent .= "Premium: $" . number_format($policy->premium, 2) . "<br>";
        $receiptContent .= "Coverage Details: " . $policy->coverage_details . "<br>";
        $receiptContent .= "Payment Due Date: " . $policy->payment_due_date . "<br>";

        // Return the receipt as a downloadable file
        return response($receiptContent)
            ->header('Content-Type', 'text/html; charset=utf-8')
            ->header('Content-Disposition', 'attachment; filename="policy_receipt_' . $policy->id . '.html"');
    }
}
