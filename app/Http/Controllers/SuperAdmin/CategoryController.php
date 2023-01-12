<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('s_admin.categories', ['category' => $category]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'id' => 'required',
            'keterangan' => 'required',

        ]);
        Category::create([
            'id' => $request->id,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/categories');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json([
            'status' => 200,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        DB::table('categories')->where('id', $request->id)->update([

            'id' => $request->id,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/categories');
    }
    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
