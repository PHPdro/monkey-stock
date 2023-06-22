<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de produto') }}
        </h2>
    </x-slot>

    <form action="/stock/store" method="POST">

        @csrf

        {{-- INFORMAÇÕES --}}
        <div class="py-12" id="info">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Informações do produto') }}
                        </h2>

                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <input name="name" type="text" class="form-control" id="tag1">
                                <label for="tag1">Nome</label>
                            </div>

                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <input name="unit" type="text" class="form-control" id="tag2">
                                <label for="tag2">Unidade</label>
                            </div>

                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <select name="categories" id="categories" class="form-control" id="tag1">
                                    <option class="form-control" disabled selected value></option>
                                    @foreach ($categories as $category)
                                    <option class="form-control" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="tag1">Categoria</label>
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <input name="maximum_stock_level" type="number" class="form-control" id="tag1">
                                <label for="tag1">Estoque Máximo</label>
                            </div>
                            <div class="form-floating flex-grow-1 mt-3">
                                <input name="minimum_stock_level" type="number" class="form-control" id="tag2">
                                <label for="tag2">Estoque Mínimo</label>
                            </div>
                            <div class="form-floating flex-grow-1 mx-1 mt-3">
                                <input name="refference_value" type="number" step="0.01" class="form-control" id="tag1">
                                <label for="tag1">Valor referência</label>
                            </div>
                        </div>

                        <div class="form-floating flex-grow-1 mt-3" style="text-align: right">
                            <a href="#" class="btn btn-primary" style="background-color: #C96EE2; border: none;" onMouseOver="this.style.backgroundColor='#aa65bd'" onMouseOut="this.style.backgroundColor='#C96EE2'" id="next" onclick="next()">Avançar</a>
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
