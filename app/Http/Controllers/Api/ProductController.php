<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        try {
            $products = Product::all();
            return response()->json([
                'success' => true,
                'data' => $products,
                'message' => 'Berhasil mengambil daftar produk',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil daftar produk',
                'data' => null
            ], 404);
        }
    }


    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'harga' => 'required|numeric',
                'stock' => 'required|numeric',
            ], [
                'required' => ':attribute wajib diisi',
                'string' => ':attribute harus berupa string',
                'max' => ':attribute maksimal :max karakter',
                'numeric' => ':attribute harus berupa angka',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'data' => null
                ], 422);
            }
            $product = Product::create($validator->validated());
            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan',
                'data' => $product
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan produk',
                'data' => null
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk tidak ditemukan',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditemukan',
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menemukan produk',
                'data' => null
            ], 500);
        }
    }


    public function update(Request $request, string $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk tidak ditemukan',
                    'data' => null
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'nama' => 'sometimes|required|string|max:255',
                'harga' => 'sometimes|required|integer',
                'stock' => 'sometimes|required|integer',
            ], [
                'required' => ':attribute wajib diisi',
                'string' => ':attribute harus berupa string',
                'max' => ':attribute maksimal :max karakter',
                'integer' => ':attribute harus berupa angka bulat',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'data' => null
                ], 422);
            }

            $product->update($validator->validated());

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil diperbarui',
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui produk',
                'data' => null
            ], 500);
        }
    }


    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk tidak ditemukan',
                    'data' => null
                ], 404);
            }

            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil dihapus',
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus produk',
                'data' => null
            ], 500);
        }
    }
}
