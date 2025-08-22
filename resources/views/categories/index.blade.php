<x-layouts.app>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-700">Categories</h1>
        <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">+ Add Category</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Products Count</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($categories as $category)
                    <tr>
                        <td class="py-3 px-4">{{ $category->name }}</td>
                        <td class="py-3 px-4">{{ $category->products->count() }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('categories.edit', $category) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete category?')" class="text-red-500 hover:text-red-700 ml-4">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
