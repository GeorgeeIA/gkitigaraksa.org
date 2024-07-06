<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
  public function index()
  {
    $user = User::orderBy('created_at', 'DESC')->get();
    return view('admin.user.index', compact('user'));
  }

  public function store(Request $req)
  {
    $req->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8'],
    ]);

    User::create([
      'role' => $req['role'],
      'name' => $req['name'],
      'email' => $req['email'],
      'password' => Hash::make($req['password']),
    ]);

    return back()->with('success', 'Data berhasil ditambah');
  }


  public function edit($id)
  {

    $user = User::find($id);

    return view('admin.user.edit', compact('user'));
  }

  public function update(Request $req, $id)
  {

    $user = User::find($id);
    if (!$user) {
      return response()->json(['message' => 'User not found'], 404);
    }

    $validator = Validator::make($req->all(), [
      'name' => 'sometimes|required|string|max:255',
      'role' => 'sometimes|required',
      'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
      'password' => 'nullable|string|min:8',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }

    if ($req->has('name')) {
      $user->name = $req->name;
    }
    if ($req->has('role')) {
      $user->role = $req->role;
    }
    if ($req->has('email')) {
      $user->email = $req->email;
    }
    if ($req->filled('password')) {
      $user->password = Hash::make($req->password);
    }

    $user->save();

    return redirect(route('admin.user.index'))->with('success', 'Data berhasil diupdate');
  }

  public function delete($id)
  {
    $user = User::find($id);

    $user->delete();

    return back()->with('success', 'Data berhasil dihapus');
  }
}
