<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show_users()
    {
        $users = User::paginate(4);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('register');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return back()->with('success', "User deleted successfully");
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view("admin.users.edit", compact('user'));
    }

    public function show(User $user)
    {
        if (empty(auth()->user())) {
            header('Location: ' . route('login'));
            exit;
        } else {
            $user = [
                'id' => auth()->user()['id'],
                'name' => auth()->user()['name'],
                'email' => auth()->user()['email'],
                'image' => auth()->user()['image'],
                'phone' => auth()->user()['phone'],
                'city' => auth()->user()['city'],
                'role' => auth()->user()['role'],
                'created_at' => auth()->user()['created_at']->format('Y-m-d'),
            ];

            return view("user.profile", compact('user'));
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $role = $request->role;
        $users = User::orderBy('id');

        if ($role) {
            $users = $users->where('role', $role);

        }
        $columns = Schema::getColumnListing('users');

        foreach ($columns as $column) {
            $users = $users->orWhere($column, 'LIKE', '%' . $search . '%');
        }

        $users = $users->paginate(4);

        if ($users->isEmpty()) {
            return redirect()->route('admin.users')->with('message', "We're sorry, we couldn't find any matches for your search. Would you like to try a different search term?");
        }

        return view('admin.users.index', compact('users'));
    }
    public function store(Request $request)
    {
        $address = "$request->street $request->city $request->governorate";
        $address = trim($address);
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

    public function update(Request $request, $id)
    {
        $request['city'] = "$request->street $request->city $request->governorate";
        $request['city'] = trim($request['city']);

        $user = User::find($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'city' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
            'image' => 'nullable|image',
        ]);

        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->city = $validatedData['city'];
        $user->email = $validatedData['email'];

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/img/' . $user->image);
            }

            $image = md5(microtime()) . "." . $request->image->extension();
            Storage::makeDirectory('public/img');
            $request->image->storeAs("public/img", $image);
            $user->image = $image;
        }

        if ($request['role']) {
            $user->role = $request['role'];
        }

        $user->update();

        return back()->with('success', 'User data modified successfully');
    }

    public function show_mc()
    {
        $data=User::where ('role','maintenance_center')->paginate(2);
        //data  // in php:select all from table users where role =maintenance_center
        return view('mccards' ,compact('data'));  //view + data returned compacted from DB

    }
    public function show_mc_profile($id)
    {

        $user = User::find($id);
        return view("profile1", compact('user'));
    }


    public function searches(Request $request)
    {
        $search = $request->input('search');
        // $data = User::where('role', 'maintenance_center')->where('name', 'LIKE', '%'.$search.'%')->paginate(2);
        $data = User::where('role', 'Maintenance_Center')->where(function ($query) use ($search) {
            $columns = Schema::getColumnListing('users');
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $search . '%');
            }
        })
            ->paginate(2);
        return view('mccards', ['data' => $data]);
    }

}
