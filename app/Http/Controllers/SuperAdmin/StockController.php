<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use App\User;
use GuzzleHttp\Handler\Proxy;

class StockController extends Controller
{
    public function index()
    {

        $product = product::get();
        $toko1 = Stock::where('user_id', '1')->get();
        $user = user::get();
        $category = category::all();
        $stock = Stock::all();
        return view('s_admin.stock', [
            'product' => $product,
            'category' => $category,
            'stock' => $stock,
            'user' => $user,
            'toko1' => $toko1
        ]);
    }
    public function stok_ajax($id)
    {
        $product = DB::table("products")
            ->where("category_id", $id)
            ->pluck("nama", "id");
        return json_encode($product);
    }
    public function edit($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return response()->json([
            'status' => 200,
            'product' => $product,
            'category' => $category,
        ]);
    }
    public function update(Request $request)
    {

        DB::table('products')->where('id', $request->id)->update([
            'id' => $request->id,
            'stok' => $request->stok,
            'terjual' => $request->terjual,
        ]);

        return redirect('/stok_barang');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            // 'id_kategori' => 'required',
            'stok' => 'required',
        ]);

        $stok = Stock::where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)->get();


        if ($stok->IsNotEmpty()) {
            $jumlah = Stock::where('user_id', $request->user_id)
                ->where('product_id', $request->product_id)->value('stok');
            // dd($jumlah);
            $stok = Stock::where('user_id', $request->user_id)
                ->where('product_id', $request->product_id)
                ->update(['stok' => $jumlah + $request->stok]);
        } else {
            Stock::create([
                'stok' => $request->stok,
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]);
        }

        $product = Product::findOrFail($request->product_id);
        $product->stok -= $request->stok;
        $product->update();

        return redirect('/stok_barang');
    }
}
