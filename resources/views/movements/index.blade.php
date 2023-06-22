<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Movimentações') }}
        </h2>
    </x-slot>

    <style>

        table {
            table-layout: fixed;
        }

        td, th {
            border: 1px solid black;
            text-align: center;
        }

        td.name:hover {
            background-color: lightgrey;
        }

    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{ route('movements.create') }}" class="btn btn-primary" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'">Cadastrar movimentação</a>

                    @if (count($movements) > 0)
                        <form action="/movements/delete/{{ $last->id }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" type="submit" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'">Desfazer última movimentação</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Histórico de movimentações') }}
                    </h2>

                    @if (count($movements) == 0)
                        <p>Nenhuma movimentação cadastrada.</p>
                    @else

                        <table style="width:100%">
                            <thead>
                                <tr style="background-color: #C96EE2;">
                                    <th>Data</th>
                                    <th>Produto</th>
                                    <th>Tipo</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <th>Fornecedor(es)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movements as $movement)
                                    <tr>
                                        <td class="name">
                                            <a href="#" style="text-decoration: none;color:black" data-bs-toggle="modal" data-bs-target="#{{ $movement->id }}Modal">{{ date('d/m/Y', strtotime($movement->date)) }}</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="{{ $movement->id }}Modal" tabindex="-1" aria-labelledby="{{ $movement->id }}ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="{{ $movement->id }}ModalLabel">Descrição</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p>{{ $movement->description }}</p>

                                                    </div>
                                                </div>
                                        </td>
                                        <td>
                                            {{ $movement->product_name }}
                                        </td>
                                        <td>
                                            @if ($movement->type == 1)
                                                ENTRADA
                                            @else
                                                SAÍDA
                                            @endif
                                        </td>
                                        <td>
                                            {{ $movement->quantity }}
                                        </td>
                                        <td>
                                            {{ $movement->value }}
                                        </td>
                                        <td>
                                            @foreach ($movement->suppliers as $supplier)
                                                {{ $supplier->name }} <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
