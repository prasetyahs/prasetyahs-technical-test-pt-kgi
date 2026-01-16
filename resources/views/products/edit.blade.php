@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-900">Edit Produk</h1>
            <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                &larr; Kembali
            </a>
        </div>

        <div class="bg-white shadow rounded-lg border border-gray-200 p-6">
          
                <!-- Static Edit Method simulation -->
                <input type="hidden" name="_method" value="PUT">

                <div class="space-y-6">
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <div class="mt-1">
                            <input type="text" name="nama" id="nama"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
                                placeholder="Masukkan nama produk">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                            <div class="mt-1">
                                <input type="number" name="harga" id="harga"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
                                    placeholder="0">
                            </div>
                        </div>

                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
                            <div class="mt-1">
                                <input type="number" name="stock" id="stock"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
                                    placeholder="0">
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="button" onclick="updateProduct()"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out shadow-sm font-medium">
                            Perbarui Produk
                        </button>
                    </div>
                </div>
        </div>
    </div>
@endsection
