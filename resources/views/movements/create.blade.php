<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastrar movimentação') }}
        </h2>
    </x-slot>

    <form action="{{ route('movements.store') }}" method="POST">
        @csrf
        <div class="py-12" id="info">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Informações da movimentação') }}
                        </h2>

                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <select name="type" id="type" class="form-control" id="tag1">
                                    <option class="form-control" disabled selected value></option>
                                    <option value="1">ENTRADA</option>
                                    <option value="2">SAÍDA</option>
                                </select>
                                <label for="tag1">Tipo</label>
                            </div>

                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <select name="product" id="product" class="form-control" id="tag1">
                                    <option class="form-control" disabled selected value></option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                </select>
                                <label for="tag1">Produto</label>
                            </div>

                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <input name="quantity" type="number" class="form-control" id="tag1">
                                <label for="tag1">Quantidade</label>
                            </div>

                            <div class="form-floating flex-grow-1 mt-3">
                                <input name="value" type="number" class="form-control" id="tag2">
                                <label for="tag2">Valor</label>
                            </div>
                        </div>

                        <div class="form-group d-flex">

                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <input name="date" type="date" class="form-control" id="tag1">
                                <label for="tag1">Data</label>
                            </div>
                            <div class="form-floating flex-grow-1 mt-3">
                                <input name="description" type="text" class="form-control" id="tag2">
                                <label for="tag2">Descrição (opcional)</label>
                            </div>
                        </div>

                        <div class="form-floating flex-grow-1 mt-3" style="text-align: right">
                            <a href="#" class="btn btn-primary" id="next" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'" onclick="next()">Avançar</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="py-12" style="display:none" id="suppliers">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Fornecedores') }}
                        </h2>

                        @if (count($suppliers) == 0)
                            <p>Nenhum fornecedor foi cadastrado.</p>
                        @else
                            @foreach ($suppliers as $supplier)
                            <div class="form-floating flex-grow-1 mx-1">
                                <input type="checkbox" class="form-control" name="suppliers[]" value="{{ $supplier->id }}" id="tag1">
                                <label for="tag1">{{ $supplier->name }}</label>
                            </div>
                            @endforeach
                        @endif

                        <div class="form-floating flex-grow-1 mt-3" style="text-align: right">
                            <a href="#" class="btn btn-secondary" id="next"  onclick="back()">Voltar</a>
                            <button type="submit" class="btn btn-primary" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'">Salvar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>

<script src="{{ asset('/js/script.js') }}"></script>

</x-app-layout>
