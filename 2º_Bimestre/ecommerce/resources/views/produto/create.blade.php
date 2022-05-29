<x-app-layout>
    <x-slot name="header">
        Novo Produto
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('produto.store')}}" method="post">
                        @csrf
                        <div>
                            <x-label>Informe o Nome:</x-label>
                            <x-input name="nome"
                                     class="block mt-1 w-full"/>
                        </div>
                        <div>
                            <x-label>Informe a Descricao:</x-label>
                            <x-input name="descricao"
                                     class="block mt-1 w-full"/>
                        </div>
                        <div>
                            <x-label>Informe o Preço do Produto:</x-label>
                            <x-input name="preco" 
                                     class="block mt-1 w-full"/>

                        </div>
                        <div>
                            <x-label>Selecione a Categoria:</x-label>
                            <select name="categoria_id">
                                @foreach($categorias as $c)
                                <option value="{{$c->id}}">{{$c->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-label>Selecione um Fornecedor:</x-label>
                            <select name="forncedor_id">
                                @foreach($forncedors as $f)
                                <option value="{{$f->id}}">{{$f->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-5">
                            <x-button>Salvar</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>

