@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900">Daftar Produk</h1>
            <a href="{{ route('products.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out shadow-sm">
                + Tambah Produk
            </a>
        </div>

        <div class="bg-white shadow overflow-hidden rounded-lg border border-gray-200 overflow-x-auto max-h-[70vh]">
            <table class="min-w-full divide-y divide-gray-200 relative">
                <thead class="bg-gray-50 sticky top-0 z-10 shadow-sm">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sticky left-0 bg-gray-50 z-20">
                            No</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Produk</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider sticky right-0 bg-gray-50 z-20">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody id="product-list" class="bg-white divide-y divide-gray-200">
                    <!-- Data loaded via API -->
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Loading data...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
