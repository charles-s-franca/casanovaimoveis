<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile()
    {
        return view('user.profile', ['name' => 'James']);
    }

    public function upload(Request $request){
        // print_r($request->file('file'));
        // exit;
        if ($request->file('file')->isValid()) {
            $file = $request->file;
//            print_r($file);
            $path = $request->file->store('public');
            exit($path);
        }
    }
}