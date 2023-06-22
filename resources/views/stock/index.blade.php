<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estoque de '.Auth::user()->name) }}
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

                    <a href="/stock/create" class="btn btn-primary" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'">Cadastrar produto</a>

                    {{-- MODAL CATEGORIA --}}

                    <div class="form-floating flex-grow-1 mt-3" id="new_category" style="display: inline-block">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'">
                            Cadastrar categoria
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Nova categoria</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('category.store') }}" method="POST">
                                        @csrf

                                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                                            <input name="new_category" type="text" step="0.01" class="form-control" id="tag1">
                                            <label for="tag1">Nome</label>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'">Salvar</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL FORNECEDORES --}}

                    <div class="form-floating flex-grow-1 mt-3" id="new_supplier" style="display: inline-block">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#supplierModal" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'">
                            Cadastrar fornecedor
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="supplierModalLabel">Novo fornecedor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('supplier.store') }}" method="POST">
                                        @csrf

                                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                                            <input name="new_supplier" type="text" step="0.01" class="form-control" id="tag1">
                                            <label for="tag1">Nome</label>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Fechar</button>
                                            <button type="submit" class="btn btn-primary"  style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="display:inline-block;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Produtos') }}
                    </h2>

                    @if (count($products) == 0)
                        <p>Nenhum produto cadastrado.</p>
                    @else

                        <a href="#" class="btn btn-primary" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'" onclick="showStock(0)">TODOS</a>

                        @foreach ($categories as $category)
                            <a href="#" class="btn btn-primary" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'" onclick="showStock({{ $category->id }})">{{ $category->name }}</a>
                        @endforeach

                        <p></p>

                        <div id="0">
                            <table style="width:100%">
                                <thead>
                                    <tr style="background-color: #C96EE2;">
                                        <th>Nome</th>
                                        <th>Fornecedor(es)</th>
                                        <th>Estoque máximo</th>
                                        <th>Estoque mínimo</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td>
                                                @foreach ($product->suppliers as $supplier)
                                                    {{ $supplier->name }} <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $product->maximum_stock_level }}
                                            </td>
                                            <td>
                                                {{ $product->minimum_stock_level }}
                                            </td>
                                            <td>
                                                @if ($product->balance <= $product->minimum_stock_level || $product->balance == $product->maximum_stock_level)
                                                    <label style="color:red">{{ $product->balance }}</label>
                                                @else
                                                    {{ $product->balance }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @for ($i =0; $i < count($categories); $i++)
                            <div id="{{ $categories[$i]->id }}" style="display:none;">

                                @if (count($categories[$i]->products) == 0)
                                    <p>Nenhum produto na categoria {{ $categories[$i]->name }}.</p>

                                @else
                                    <table style="width:100%">
                                        <thead>
                                        <tr style="background-color: #C96EE2;">
                                            <th>Nome</th>
                                            <th>Fornecedor(es)</th>
                                            <th>Estoque máximo</th>
                                            <th>Estoque mínimo</th>
                                            <th>Saldo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories[$i]->products as $product)
                                                <tr>
                                                    <td class="name">
                                                        <a href="#" title="MODIFICAR PRODUTO" style="text-decoration: none;color:black" data-bs-toggle="modal" data-bs-target="#{{ $product->id }}Modal">{{ $product->name }}</a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="{{ $product->id }}Modal" tabindex="-1" aria-labelledby="{{ $product->id }}ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="{{ $product->id }}ModalLabel">{{ $product->name }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/products/update/{{ $product->id }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                                                                            <input name="name" type="text" class="form-control" id="tag1" value="{{ $product->name }}">
                                                                            <label for="tag1">Nome</label>
                                                                        </div>

                                                                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                                                                            <input name="unit" type="text" class="form-control" id="tag1" value="{{ $product->unit }}">
                                                                            <label for="tag1">Unit</label>
                                                                        </div>

                                                                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                                                                            <input name="maximum_stock_level" type="number" class="form-control" id="tag1" value="{{ $product->maximum_stock_level }}">
                                                                            <label for="tag1">Estoque máximo</label>
                                                                        </div>

                                                                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                                                                            <input name="minimum_stock_level" type="number" class="form-control" id="tag1" value="{{ $product->minimum_stock_level }}">
                                                                            <label for="tag1">Estoque mínimo</label>
                                                                        </div>

                                                                        <div class="form-floating flex-grow-1 mx-1 mt-3">
                                                                            <input name="refference_value" type="number" class="form-control" id="tag1" value="{{ $product->refference_value }}">
                                                                            <label for="tag1">Valor referência</label>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-primary" type="submit">Salvar alterações</button>
                                                                        </div>

                                                                    </form>

                                                                </div>
                                                                <form action="/products/delete/{{ $product->id }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-secondary" type="submit" style="background-color: #d44d4d; border: none;" onMouseOver="this.style.backgroundColor='#ba4949'" onMouseOut="this.style.backgroundColor='#d44d4d'">
                                                                        <img src="/imgs/lixo.png" alt="delete" width="25" height="25">
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @foreach ($product->suppliers as $supplier)
                                                            {{ $supplier->name }} <br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {{ $product->maximum_stock_level }}
                                                    </td>
                                                    <td>
                                                        {{ $product->minimum_stock_level }}
                                                    </td>
                                                    <td>
                                                        {{ $product->balance }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div style="text-align: right">
                                        <p>
                                            <form action="/category/delete/{{ $categories[$i]->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-primary" type="submit" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'">Excluir categoria</button>
                                            </form>
                                        </p>
                                    </div>

                                @endif
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="display:inline-block;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Fornecedores') }}

                        <div>

                            @foreach ($suppliers as $supplier)
                                <p>{{ $supplier->name }}</p>
                            @endforeach

                        </div>


                    </h2>
                </div>
            </div>
        </div>
    </div>

<script>

function showStock(categoria) {

    const size = {{ $size }};
    for (var i = 0; i <= size; i++) {

        var tabela = document.getElementById(i);

        if (i == categoria) {
            tabela.style.display = 'block';
        } else {
            tabela.style.display = 'none';
        }
    }
}

</script>

</x-app-layout>
