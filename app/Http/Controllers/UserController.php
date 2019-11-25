<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
      $users = User::all();
      return response()->json($users);
    }

    public function create(Request $request)
    {
      $user = new User();

      $user->name = $request->name;
      $user->username = $request->username;
      $user->email = $request->email;

      $user->save();
      return response()->json($user);
    }

    public function show($id)
    {
      $user = User::find($id);
      return response()->json($user);
    }
    
    public function update(Request $request, $id)
    {
      $user = User::find($id);

      $user->name = $request->input('name');
      $user->username = $request->input('username');
      $user->email = $request->input('email');

      $user->save();
      return response()->json($user);
    }

    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();

      return response()->json($user);
    }

    //
}
