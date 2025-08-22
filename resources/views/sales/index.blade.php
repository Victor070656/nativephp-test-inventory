<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-700">Sales</h1>
        <a href="{{ route('sales.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">+ Record Sale</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Product</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Quantity</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Total Price</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Sale Date</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($sales as $s)
                    <tr>
                        <td class="py-3 px-4">{{ $s->product->name }}</td>
                        <td class="py-3 px-4">{{ $s->quantity }}</td>
                        <td class="py-3 px-4">₦{{ number_format($s->total_price, 2) }}</td>
                        <td class="py-3 px-4">{{ date('Y-m-d H:i', strtotime($s->sale_date)) }}</td>
                        <td class="py-3 px-4">
                            <form action="{{ route('sales.destroy', $s) }}" method="POST">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this sale?')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4">No sales recorded</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $sales->links() }}
    </div>
</x-layouts.app>
