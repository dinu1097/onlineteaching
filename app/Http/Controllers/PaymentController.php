<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    // Method to process payment
    public function processPayment(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,enrollment_id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'payment_status' => 'required|in:completed,pending',
            'transaction_id' => 'required|string',
        ]);

        $payment = Payment::create($request->all());

        return response()->json(['message' => 'Payment processed successfully'], 201);
    }

    // Method to refund payment
    public function refundPayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['payment_status' => 'refunded']);

        return response()->json(['message' => 'Payment refunded']);
    }

    public function paymentHistory()
    {
        $student_id = Auth::id(); // Get the ID of the currently authenticated user

        // Raw SQL query to get payment history for the authenticated student
        $payments = DB::select("
            SELECT payments.payment_id, payments.amount, payments.payment_method, 
                payments.payment_status, payments.transaction_id, payments.created_at
            FROM payments
            JOIN enrollments ON payments.enrollment_id = enrollments.enrollment_id
            WHERE enrollments.student_id = ?
        ", [$student_id]);

        return view('payment-history', ['payments' => $payments]);
    }
}
