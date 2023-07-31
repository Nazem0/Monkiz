<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    if (auth()->attempt($request->except("_token"))) {
      return redirect()->route("user.profile");
    } else {
      return redirect()->route("login")->with("error", "Invalid credentials. Please try again.");
    }
  }

  public function logout()
  {
    auth()->logout();

    return redirect()->route('index');
  }


  public function store(Request $request)
  {
    $address = "$request->street $request->district $request->city $request->governorate";

    $request->validate([
      'name' => 'required',
      'password' => 'required|min:8',
      'email' => 'required|email',
      'image' => 'image',
    ]);

    $image = md5(microtime()) . "." . $request->image->extension();
    $password = Hash::make($request->password);

    Storage::makeDirectory('public/img');
    $request->image->storeAs("public/img", $image);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $password,
      'image' => $image,
      'city' => $address,
      'phone' => $request->phone,
      'role' => $request->role,
    ]);

    auth()->login($user);

    return redirect()->route('user.profile');
  }

}
