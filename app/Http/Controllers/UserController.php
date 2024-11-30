<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function listAllUsers(Request $request) {
        // lógica
        $users = User::all();
        return view('user.listAllUsers', ['users' => $users]);
    }

    public function listUser(Request $request, $uid) {
        print($uid);
        $user = User::where('id', $uid)->first();
        return view('user.profiles', ['user' => $user]);

    }
    public function moderateUser(Request $request, $uid) {
        print($uid);
        $user = User::where('id', $uid)->first();
        return view('user.moderator', ['user' => $user]);

    }

    public function updateUser(Request $request, $uid) {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'string|min:8|confirmed',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('photo')->store('images','public');
        

        $user = User::where('id', $uid)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->photo = $imagePath;
        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('ListUserById', [$user->id])
                ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteUser(Request $request, $uid) {
        User::where('id', $uid)->delete();
        return redirect()->route('ListAllUsers')
                ->with('message', 'Atualizado com sucesso!');
    }


    public function registerUser(Request $request) {
        if ($request->method() === 'GET') {

            return view('user.register');

        } else {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()
                    ->route('ListAllUsers')
                    ->with('success', 'Registro realizado com sucesso.');

        }

    }

    public function editUser(Request $request,$uid) {
            $user = User::where('id', $uid)->first();
          return view('user.editUser', ['user' => $user]);
    }


}
