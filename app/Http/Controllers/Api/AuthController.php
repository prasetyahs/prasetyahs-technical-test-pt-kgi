<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{



    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ], [
                'required' => ':attribute wajib diisi',
                'email' => ':attribute harus berupa email yang valid',
                'string' => ':attribute harus berupa string',
                'min' => ':attribute minimal :min karakter',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'data' => null
                ], 422);
            }

            if (!$token = auth('api')->attempt($validator->validated())) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau password salah',
                    'data' => null
                ], 401);
            }

            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'data' => $token
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login gagal',
                'data' => null
            ], 500);
        }
    }
}
