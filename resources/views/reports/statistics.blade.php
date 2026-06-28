<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistiques') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Total Products -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Produits</dt>
                        <dd class="mt-1 text-3xl font-extrabold text-blue-600">{{ $stats['total_products'] }}</dd>
                    </div>
                </div>

                <!-- Low Stock Products -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Stock Faible</dt>
                        <dd class="mt-1 text-3xl font-extrabold text-red-600">{{ $stats['low_stock_products'] }}</dd>
                    </div>
                </div>

                <!-- Total Movements -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Mouvements</dt>
                        <dd class="mt-1 text-3xl font-extrabold text-purple-600">{{ $stats['total_movements'] }}</dd>
                    </div>
                </div>

                <!-- In Movements -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Entrées</dt>
                        <dd class="mt-1 text-3xl font-extrabold text-green-600">{{ $stats['in_movements'] }}</dd>
                    </div>
                </div>

                <!-- Out Movements -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Sorties</dt>
                        <dd class="mt-1 text-3xl font-extrabold text-orange-600">{{ $stats['out_movements'] }}</dd>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Rapports</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{ route('reports.inventory') }}" class="inline-flex items-center justify-center px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            📊 Inventaire Complet
                        </a>
                        <a href="{{ route('reports.movements') }}" class="inline-flex items-center justify-center px-4 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                            📈 Mouvements
                        </a>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-4 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            🏠 Retour Accueil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>