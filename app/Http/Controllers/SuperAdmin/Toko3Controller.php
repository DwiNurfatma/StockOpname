<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use App\User;

class Toko3Controller extends Controller
{
    public function toko3()
    {
        $product = product::get();
        $stock = Stock::where('user_id', '4')->get();
        $user = user::get();
        $category = category::all();
        return view('s_admin.toko3', [
            'product' => $product,
            'category' => $category,
            'stock' => $stock,
            'user' => $user,
        ]);
    }
    public function toko3_ajax($id)
    {
        $product = DB::table("products")
            ->where("category_id", $id)
            ->pluck("nama", "id");
        return json_encode($product);
    }
    public function store3(Request $request)
    {

        $this->validate($request, [
            // 'id_kategori' => 'required',
            'stok' => 'required',
        ]);

        $stok = Stock::where('user_id', '4')
            ->where('product_id', $request->product_id)->get();


        if ($stok->IsNotEmpty()) {
            $jumlah = Stock::where('user_id', '4')
                ->where('product_id', $request->product_id)->value('stok');
            // dd($jumlah);
            $stok = Stock::where('user_id', '4')
                ->where('product_id', $request->product_id)
                ->update(['stok' => $jumlah + $request->stok]);
        } else {
            Stock::create([
                'stok' => $request->stok,
                'product_id' => $request->product_id,
                'user_id' => '4',
                'category_id' => $request->category_id,
            ]);
        }

        $product = Product::findOrFail($request->product_id);
        $product->stok -= $request->stok;
        $product->update();

        return redirect('/toko3');
    }
}
