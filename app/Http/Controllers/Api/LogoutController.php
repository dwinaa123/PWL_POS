<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth; // Memperbaiki: Menambahkan impor kelas JWTAuth


class LogoutController extends Controller
{
    public function __invoke()
    {
        // Menggunakan JWTAuth::getToken() untuk mengambil token JWT saat ini
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        
        if ($removeToken) {
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil',
            ]);
        }
    }
}
