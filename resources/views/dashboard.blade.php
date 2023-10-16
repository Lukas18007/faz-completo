<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex align-content-sm-center justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="border-separate border-spacing-2 justify-center">
                        <thead>
                          <tr>
                            <th class="border border-slate-600">Descrição</th>
                            <th class="border border-slate-600">Valor</th>
                            <th class="border border-slate-600">Data de pagamento</th>
                            <th class="border border-slate-600">Forma de pagamento</th>
                            <th class="border border-slate-600">Excluir</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($gastos as $gasto)
                            <tr>
                                <td class="border border-slate-700">{{ $gasto->description }} </td>
                                <td class="border border-slate-700">R${{ $gasto->value }} </td>
                                <td class="border border-slate-700"> {{ \Carbon\Carbon::parse($gasto->dt_payment)->format('d/m/Y') }} </td>
                                <td class="border border-slate-700"> {{ $gasto->payment_type }} </td>
                                <td class="border border-slate-700">
                                    <form method="POST" action="{{ route('gastos.excluir', ['id' => $gasto->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="ml-4" type="submit">X</x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>Total: R${{ $sum }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
