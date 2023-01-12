<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(10);
        return view('s_admin.users', ['user' => $user]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect('/user');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
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

        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);
        return redirect('/user');
    }
    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
