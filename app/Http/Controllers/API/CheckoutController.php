<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use App\Http\Requests\API\CheckoutRequest;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        // menangkap data dari request kecuali detail transaksi
        $data = $request->except('transaction_detail');

        // khusus data uuid, digenerate dengan format TRXRANDOM
        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);

        // buat variabel dengan nama $transaction untuk memasukkan data request ke tabel Transaction
        $transaction = Transaction::create($data);

        // lakukan perulangan untuk menangkap request transaction_detail yang berisi banyak data.
        foreach ($request->transaction_detail as $product) {
            // buat variabel dengan nama $details yang berupa array kosong
            // yang isinya berfungsi untuk memasukkan data ke tabel transactiondetail
            // array kosong $detail akan diisi dengan array yang memiliki 2 data, yakni: 
            // transaction_id [didapat dari variabel $transaction]
            // product_id yang didapatkan dari id product hasil perulangan
            $details[] = new TransactionDetail(
                [
                    'transaction_id' => $transaction->id,
                    'product_id' => $product,
                ]);

                // kurangi quantity product yang dibeli, sesuai dengan id productnya
                Product::find($product)->decrement('quantity');
        }

        // panggil variabel transaction, panggil relasinya, masukan data array $details ke table TransactionDetails
        $transaction->details()->saveMany($details);

        // kembalikan data transaksi
        return ResponseFormatter::success($transaction);
    }
}
