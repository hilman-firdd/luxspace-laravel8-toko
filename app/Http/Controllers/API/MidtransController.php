<?php

namespace App\Http\Controllers\API;

use Midtrans\Notification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MidtransController extends Controller
{
    public function callback()
    {
        // set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // buat instance midtrans notification
        $notifikasi = new Notification();

        // assign ke variable untuk memudahkan coding
        $status = $notifikasi->transaction_status;
        $type = $notifikasi->payment_type;
        $fraud = $notifikasi->fraud_status;
        $order_id = $notifikasi->order_id;

        // get transaksi id 
        $order = explode('-', $order_id); // ['lux', 4] berarti ngambil nu 4

        // cari transaksi berdasarkan id
        $transaction = Transaction::findOrFail($order[1]);

        // handle notifikasi status middtrans
        if($status == 'capture') {
            if($type == 'credit_card'){
                if($fraud == 'challange') {
                    $transaction->status = 'PENDING';
                }else{
                    $transaction->status = 'SUCCESS';
                }
            }
        }

        else if ($status == 'settlement') {
            $transaction->status = 'SUCCESS';
        }

        else if($status == 'pending') {
            $transaction->status = 'PENDING';
        }

        else if($status == 'deny') {
            $transaction->status = 'PENDING';
        }

        else if($status == 'expire') {
            $transaction->status = 'CANCELLED';
        }

        else if($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }


        // simpan transaksi 
        $transaction->save();

        // return response untuk midtrans
        return response()->json([
            'meta' => [
                'code' => 200,
                'message' =>  'Midtrans Notification Success'
            ]
        ]);

    }
}
