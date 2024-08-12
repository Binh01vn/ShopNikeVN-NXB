<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceMail;

class InvoiceController extends Controller
{
    public function generateInvoice(string $id)
    {
        $model = Order::query()->with(['orderItems'])->findOrFail($id);
        // Lấy dữ liệu cần thiết cho hóa đơn
        $data = [
            'invoice_number' => $model->user_id . '_' . Str::slug($model->user_name),
            'customer_name' => $model->user_name,
            'status_order' => $model->status_order,
            'status_payment' => $model->payment,
            'status_total' => $model->total_price,
        ];
        foreach ($model->orderItems as $order) {
            $data['items'][] = [
                'name' => $order->product_name,
                'size' => $order->variant_size_name,
                'color' => $order->variant_color_name,
                'price' => $order->product_price_regular,
                'quantity' => $order->quantity,
            ];
        }
        // dd($data);
        // Tạo view cho hóa đơn
        $pdf = PDF::loadView('admin.HoaDon.inPDF.invoice', $data);

        // Đặt tên file và thư mục lưu trữ
        $fileName = 'Hoadon_' . $data['invoice_number'] . '.pdf';
        $filePath = 'invoices/' . $fileName;
        // dd(storage_path('app/public/' . $filePath));
        // Lưu file PDF vào thư mục lưu trữ
        $pdf->save(storage_path('app/public/' . $filePath));

        $user_id = $model->user_id;
        $user = User::query()->where('id', $user_id)->first();
        $nameUser = $user->name;
        $emailUser = $user->email;
        $invoiceData = [
            'customer_name' => $nameUser,
            'path' => storage_path('app/public/' . $filePath), // Đường dẫn tới file PDF
        ];
        Mail::to($emailUser)->send(new InvoiceMail($invoiceData));

        // Hoặc nếu bạn muốn lưu vào thư mục công khai
        // $pdf->save(public_path('invoices/' . $fileName));
        return back();
    }
}
