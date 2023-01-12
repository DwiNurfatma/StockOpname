<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        $category = Category::all();
        return view('s_admin.product', ['product' => $product, 'category' => $category]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            // 'id_kategori' => 'required',
            'nama' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        // menyimpan data file yang diupload ke variabel $file
        $product = $request->file('gambar');

        $nama_file = time() . "_" . $product->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';
        $product->move($tujuan_upload, $nama_file);

        Product::create([
            'gambar' => $nama_file,
            'nama' => $request->nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
        ]);


        return redirect('/produk');
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
dd($request);
        DB::table('products')->where('id', $request->id)->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'category_id' => $request->category_id,

        ]);

        return redirect('/produk');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
