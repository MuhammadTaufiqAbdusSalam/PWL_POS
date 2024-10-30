<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
class LogoutController extends Controller
{
    public function __invoke(Request $request){
        //remove token
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());
        if($removeToken){
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil!',
            ]);
        }
    }
}
