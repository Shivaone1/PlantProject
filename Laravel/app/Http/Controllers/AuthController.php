<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validation->fails()) {
            $errors = $validation->errors()->first();
            return responseStatus('', false, $errors, 302);
        }
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            return responseStatus($user, true, DATA_STORE, 200);
        } catch (\Throwable $th) {
            return responseStatus('', false, $th, 301);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);
        if ($validation->fails()) {
            $errors = $validation->error()->first();
            return responseStatus('', false, $errors, 302);
        }
        $user = User::find($request->email);
        return responseStatus($user, true, USERLOGIN, 200);
    }
}
