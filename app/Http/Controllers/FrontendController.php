<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;

class FrontendController extends Controller
{
    public function index(Request $request) 
    {
        $products = Product::with(['galleries'])->latest()->get();

        return view('pages.frontend.index', compact('products'));
    }

    public function details(Request $request, $slug) {
        $product = Product::with(['galleries'])->where('slug', $slug)->firstOrFail();
        $recommedations = Product::with(['galleries'])->inRandomOrder()->limit(4)->get();
        return view('pages.frontend.details', compact('product', 'recommedations'));
    }

    public function cartAdd(Request $request, $id) {
        Cart::create([
            'users_id' => Auth::user()->id,
            'products_id' => $id
        ]);

        return redirect('cart');
    }

    public function cartDelete(Request $request, $id) {
        $item = Cart::findOrFail($id);

        $item->delete();

        return redirect('cart');
    }


    public function cart(Request $request) 
    {
        $carts = Cart::with(['product.galleries'])->where('users_id', Auth::user()->id)->get();
        return view('pages.frontend.cart', compact('carts'));
    }

    public function checkout(CheckoutRequest $request) {
        $data = $request->all();

        //get cart data
        $carts = Cart::with(['product'])->where('users_id', Auth::user()->id)->get();

        //add to transactiond data
        $data['users_id'] = Auth::user()->id;
        $data['total_price'] = $carts->sum('product.price');
        
        //create transaction
        $transaction = Transaction::create($data);

        //create transaction item
        foreach ($carts as $cart) {
            $items[] = TransactionItem::create([
                'transactions_id' => $transaction->id,
                'users_id' => $cart->users_id,
                'products_id' => $cart->products_id
            ]);
        }

        //delete cart after transaction
        Cart::where('users_id', Auth::user()->id)->delete();

        //konfigurasi
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        //setup variable midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => 'LUX-'. $transaction->id,
                'gross_amount' => (int) $transaction->total_price,
            ],
            'customer_details' => [
                'first_name' => $transaction->name,
                'email' => $transaction->email
            ],
            'enabled_payments' => ['gopay', 'bank_transfer'],
            'vtweb' => []
        ];

        //payment proses

        try {
            $payment = Snap::createTransaction($midtrans)->redirect_url;
            $transaction->payment_url = $payment;
            $transaction->save();

            return redirect($payment);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function success(Request $request) {
        return view('pages.frontend.success');
    }
}
