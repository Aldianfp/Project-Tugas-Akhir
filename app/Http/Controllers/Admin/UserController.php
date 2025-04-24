<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();
        return view('admin.pages.user.index', [
            'title' => 'User',
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.pages.user.create', [
            'title' => 'Tambah User',
            'roles' => $roles
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['min:5', 'confirmed'],
            'roles' => ['required',],
            'avatar' => ['image', 'mimes:jpg,jpeg,png,svg', 'max:2048']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->only(['name', 'username', 'email', 'roles']);
            $data['password'] = bcrypt(request('password'));
            request()->file('avatar') ? $data['avatar'] = request()->file('avatar')->store('users', 'public') : NULL;
            $user = User::create($data);
            DB::commit();
            return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::where('id', '!=', auth()->id())->where('id', $id)->firstOrFail();
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.pages.user.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', 'unique:users,username,' . $id . ''],
            'email' => ['required', 'unique:users,email,' . $id . ''],
            'roles' => ['required',],
            'avatar' => ['image', 'mimes:jpg,jpeg,png,svg', 'max:2048']
        ]);

        if (request('password')) {
            request()->validate([
                'password' => ['min:5', 'confirmed'],
            ]);
        }

        DB::beginTransaction();
        try {
            $data = request()->only(['name', 'username', 'email', 'roles']);
            request('password') ? $data['password'] = bcrypt(request('password')) : NULL;
            request()->file('avatar') ? $data['avatar'] = request()->file('avatar')->store('users', 'public') : NULL;
            $user->update($data);

            DB::commit();
            return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
            return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
