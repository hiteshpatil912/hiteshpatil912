<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function update(Request $request, $id)
    {

      $this->validate($request, [
        'firstName' => 'required',
        'lastName' => 'required',
        'brithDate' => 'required',
        'phone' => 'required',
        'image' => 'required|mimes:jpg,png,jpeg|max:5048',
      ]);
      $user = User::find($id);
      $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            $originalImageSource = '/storage/' . $filePath;
    // $name = $request->file('image')->getClientOriginalName();
    // $user['image'] = $request->file('image')->store('image');
    
    $user->update([
      'firstName' =>$request->firstName,
      'lastName' => $request->lastName,
      'brithDate' =>$request->brithDate,
      'phone'=>$request->phone,
      'image' =>  $originalImageSource
    ]);
    $user->save();
    // $url =  Storage::url($user->image);
    // dd($url);
    // dd($request);
    // dd($name);
    return redirect()->route('home')->withSuccess('You have Successfully Updated');
    }

     /**
    * @return \Illuminate\Support\Collection
    */
    public function Export(Request $request) 
    {
        return Excel::download(new UsersExport, 'posts-collection.xlsx');
    }  

    /**
    * @return \Illuminate\Support\Collection
    */
    public function Import(Request $request) 
    {
        // Log::debug($request);
        $request->validate([
            'user_file' => 'required|file|mimes:xls,xlsx'
        ]);
    
        $path = $request->file('user_file');
        // Log::debug($path);
    
        Excel::import(new UsersImport, $path);
    }
   
  }
