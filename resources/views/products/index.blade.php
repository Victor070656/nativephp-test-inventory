<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-700">Products</h1>
        <div>
            <a href="{{ route('products.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">+
                Add Product</a>
            <a href="{{ route('categories.create') }}"
                class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">+
                Add Category</a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Category</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Stock</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Selling Price</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($products as $p)
                    <tr>
                        <td class="w-1/4 py-3 px-4">{{ $p->name }}</td>
                        <td class="w-1/4 py-3 px-4">{{ $p->category->name }}</td>
                        <td class="w-1/4 py-3 px-4">{{ $p->quantity }}</td>
                        <td class="w-1/4 py-3 px-4">₦{{ number_format($p->selling_price, 2) }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('products.edit', $p) }}"
                                class="text-yellow-500 hover:text-yellow-700">Edit</a>
                            <form action="{{ route('products.destroy', $p) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this product?')"
                                    class="text-red-500 hover:text-red-700 ml-4">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</x-layouts.app>