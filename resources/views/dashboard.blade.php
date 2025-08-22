<x-layouts.app>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <flux:icon icon="folder" class="h-8 w-8 text-gray-500" />
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-600">Total Products</h2>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Product::count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <flux:icon icon="shopping-cart" class="h-8 w-8 text-gray-500" />
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-600">Total Sales</h2>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Sale::count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <flux:icon icon="tag" class="h-8 w-8 text-gray-500" />
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-600">Total Categories</h2>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Category::count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <flux:icon icon="users" class="h-8 w-8 text-gray-500" />
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-600">Total Users</h2>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\User::count() }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
