<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use PDO;
use App\Mail\OrderConfirmed;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function pendingOrder()
    {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('admin.order.pending-order', compact('pending_orders'));
    }

    public function confirmOrder($id)
    {
        $order = Order::find($id);
        $order->status = 'confirmed';
        $order->save();
        Mail::to($order->user->email)->send(new OrderConfirmed($order));
        return redirect()->back()->with('success', 'Order confirmed and e-mail to the user');
    }
    public function approvedOrder()
    {
        $confirm_orders = Order::where('status', 'confirmed')->latest()->get();
        return view('admin.order.confirm-order', compact('confirm_orders'));
    }
    public function invoice($id)
    {
        $orders = Order::findOrFail($id);
        return view('admin.invoice.generate-invoice', compact('orders'));
    }

    public function generateInvoice($id)
    {
        $orders = Order::findOrFail($id);
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', compact('orders'));
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-' . $orders->id . '-' . $orders->user_info->name . '-' . $todayDate . '.pdf');
    }
}
