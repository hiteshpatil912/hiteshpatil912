<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function userList()
    {
      $user = User::with('user')->paginate(3);
      return view('admin.userView',[
          'user'=>  $user
      ]);
    }
}
