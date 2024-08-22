<?php

namespace App\Http\Controllers;
use App\Models\AdminPayments;
use Illuminate\Http\Request;

class AdminPaymentsController extends Controller
{
    public function index()
    {
        return AdminPayments::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'admin_id' => 'required|exists:admin,id',
            'enseignant_id' => 'required|exists:enseignant,id',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'transaction_id' => 'nullable|string|max:255',
        ]);

        $adminPayment = AdminPayments::create($validated);

        return response()->json($adminPayment, 201);
    }

    public function show($id)
    {
        return AdminPayments::find($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'admin_id' => 'sometimes|exists:admin,id',
            'enseignant_id' => 'sometimes|exists:enseignant,id',
            'amount' => 'sometimes|numeric|min:0',
            'currency' => 'sometimes|string|max:255',
            'payment_method' => 'sometimes|string|max:255',
            'status' => 'sometimes|string|max:255',
            'transaction_id' => 'nullable|string|max:255',
        ]);

        $adminPayment = AdminPayments::find($id);
        $adminPayment->update($validated);

        return $adminPayment;
    }

    public function destroy($id)
    {
        return AdminPayments::destroy($id);
    }
}
