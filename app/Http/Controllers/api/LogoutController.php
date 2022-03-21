<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
   // Method akan langsung di jalankan, apa bila controller ini di panggil. (single action controller)
   public function __invoke(Request $request)
   {
      //remove token
      $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

      if ($removeToken) {
         //return response JSON
         return response()->json([
            'success' => true,
            'message' => 'Logout Berhasil!',
         ]);
      }
   }
}
