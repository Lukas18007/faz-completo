<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de gastos') }}
        </h2>
    </x-slot>
    <div class="py-12 flex align-content-sm-center justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('register_gastos.gasto') }}">
                        @csrf

                        <div class="mb-4">
                        <x-input-label for="descricao" :value="__('Descrição')" />
                            <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="old('descricao')" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="valor" :value="__('Valor')" />
                            <x-text-input id="valor" class="block mt-1 w-full" type="number" step="0.01" name="valor" :value="old('valor')" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="data_pagamento" :value="__('Data de Pagamento')" />
                            <x-text-input id="data_pagamento" class="block mt-1 w-full" type="date" name="data_pagamento" :value="old('data_pagamento')" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="forma_pagamento" :value="__('Forma de Pagamento')" />
                            <x-text-input id="forma_pagamento" class="block mt-1 w-full" type="text" name="forma_pagamento" :value="old('forma_pagamento')" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
