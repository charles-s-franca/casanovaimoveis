<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

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
        if ($request->file('file')->isValid()) {
            $file = $request->file;
            // print_r($file);
            Log::info("gravando imagem");
            $path = $request->file->move(public_path("storage"), $request->file->getClientOriginalName());
            Log::info($path);
            exit($path);
        }
    }

    public function save(Request $request){
        print_r($request->input('images'));
        exit;
    }
}