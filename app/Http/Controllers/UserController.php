<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::OrderBy('id','asc')->get();
        return view('user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
    'email' => 'required|unique:users|email|max:255',
    'password' => 'required|min:8|max:255',
    'is_active' => 'required|'
],
[
    'email.required' => 'Vui lòng điền địa chỉ email',
    'email.unique' => 'Email này đã tồn tại vui lòng điền email khác',
    'email.email' => 'Địa chỉ email không hợp lệ',
    'password.required' => 'Vui lòng điền mật khẩu',
    'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    'is_active.required' => 'Vui lòng chọn trạng thái hoạt động',
]);

        $user = new User();
        $user->email = $data['email'];
        $user->password = md5($data['password']);
        $user->is_active = $data['is_active'];
        $user->save();
        toastr()->success('Thành Công','Bạn đã thêm Thành công');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
    'email' => 'required|email|max:255',
    'password' => 'required|min:8|max:255',
    'is_active' => 'required|'
],
[
    'email.required' => 'Vui lòng điền địa chỉ email',
    'email.email' => 'Địa chỉ email không hợp lệ',
    'password.required' => 'Vui lòng điền mật khẩu',
    'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    'is_active.required' => 'Vui lòng chọn trạng thái hoạt động',
]);

        $user = User::find($id);
        $user->email = $data['email'];
        $user->password = md5($data['password']);
        $user->is_active = $data['is_active'];
        $user->save();
        toastr()->success('Thành Công','Bạn đã sửa Thành công');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
