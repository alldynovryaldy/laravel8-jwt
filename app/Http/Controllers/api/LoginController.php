<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
   // Method akan langsung di jalankan, apa bila controller ini di panggil
   public function __invoke(Request $request)
   {
      //set validation
      $validator = Validator::make($request->all(), [
         'email'     => 'required',
         'password'  => 'required'
      ]);

      //if validation fails
      if ($validator->fails()) {
         return response()->json($validator->errors(), 422);
      }

      //get credentials from request
      $credentials = $request->only('email', 'password');

      //if auth failed
      if (!$token = JWTAuth::attempt($credentials)) {
         return response()->json([
            'success' => false,
            'message' => 'Email atau Password Anda salah'
         ], 401);
      }

      // if auth success
      return response()->json([
         'success' => true,
         'user'    => auth()->user(),
         'token'   => $token
      ], 200);
   }
}
