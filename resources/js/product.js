import axios from 'axios';

const productList = document.getElementById('product-list');

const formatRupiah = (number) => {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(number);
}

const fetchProducts = async () => {
    try {
        const response = await axios.get('/api/produk/public');

        const products = response.data.data;

        productList.innerHTML = '';

        if (products.length === 0) {
            productList.innerHTML = `
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        Belum ada data produk tersedia.
                    </td>
                </tr>
            `;
            return;
        }

        products.forEach((product, index) => {
            const row = `
                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 sticky left-0 bg-white z-10">${index + 1}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${product.nama}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${formatRupiah(product.harga)}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${product.stock}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2 sticky right-0 bg-white z-10">
                        <a href="/products/${product.id}/edit"
                            class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded hover:bg-indigo-100 transition">Edit</a>
                        <button onclick="deleteProduct(${product.id})"
                            class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded hover:bg-red-100 transition">Hapus</button>
                    </td>
                </tr>
            `;
            productList.innerHTML += row;
        });

    } catch (error) {
        console.error('Error fetching products:', error);
        if (productList) {
            productList.innerHTML = `
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-red-500">Gagal memuat data produk.</td>
                </tr>
            `;
        }
    }
};

window.deleteProduct = async (id) => {
    if (!confirm('Apakah Anda yakin ingin menghapus produk ini?')) return;

    try {
        await axios.delete(`/api/produk/${id}`);
        if (productList) fetchProducts();
        alert('Produk berhasil dihapus');
    } catch (error) {
        console.error('Error deleting product:', error);
        alert('Gagal menghapus produk');
    }
};

window.createProducts = async () => {
    const nama = document.getElementById('nama').value;
    const harga = document.getElementById('harga').value;
    const stock = document.getElementById('stock').value;

    if (!nama || !harga || !stock) {
        alert('Mohon lengkapi semua field');
        return;
    }

    try {
        const response = await axios.post('/api/produk', {
            nama: nama,
            harga: harga,
            stock: stock
        });
        alert(response.data.message);
        window.location.href = '/products';
    } catch (error) {
        console.error('Error creating product:', error);
        alert('Gagal menambahkan produk: ' + (error.response?.data?.message || error.message));
    }
};

if (productList) {
    fetchProducts();
}

window.updateProduct = async () => {
    const pathSegments = window.location.pathname.split('/');
    const idIndex = pathSegments.indexOf('edit') - 1;
    const id = pathSegments[idIndex];

    const nama = document.getElementById('nama').value;
    const harga = document.getElementById('harga').value;
    const stock = document.getElementById('stock').value;

    if (!nama || !harga || !stock) {
        alert('Mohon lengkapi semua field');
        return;
    }

    try {
        const response = await axios.put(`/api/produk/${id}`, {
            nama: nama,
            harga: harga,
            stock: stock
        });
        alert(response.data.message);
        window.location.href = '/products';
    } catch (error) {
        console.error('Error updating product:', error);
        alert('Gagal memperbarui produk: ' + (error.response?.data?.message || error.message));
    }
};

const fetchProductDetail = async () => {
    const pathSegments = window.location.pathname.split('/');
    const editIndex = pathSegments.indexOf('edit');

    if (editIndex > -1) {
        const id = pathSegments[editIndex - 1];
        try {
            const response = await axios.get(`/api/produk/${id}`);
            const product = response.data.data;

            document.getElementById('nama').value = product.nama;
            document.getElementById('harga').value = product.harga;
            document.getElementById('stock').value = product.stock;
        } catch (error) {
            console.error('Error fetching product detail:', error);
            alert('Gagal memuat detail produk');
        }
    }
};

if (window.location.pathname.includes('/edit')) {
    fetchProductDetail();
}
