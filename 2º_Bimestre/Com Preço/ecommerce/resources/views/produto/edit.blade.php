<x-app-layout>
    <x-slot name="header">
        Editar Produto
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('produto.update',$produto->id)}}" method="post">
                        @csrf
                        @method("PATCH")
                        <div>
                            <x-label>Informe o novo Nome:</x-label>
                            <x-input name="descricao" value="{{$produto->nome}}"
                                     class="block mt-1 w-full"/>
                        </div>
                        <div>
                            <x-label>Informe a nova Descrição:</x-label>
                            <x-input name="descricao" value="{{$produto->descricao}}"
                                     class="block mt-1 w-full"/>
                        </div>
                        <div>
                            <x-label>Informe o novo Preço:</x-label>
                            <x-input name="preco" value="{{$produto->preco}}"
                                     class="block mt-1 w-full"/>
                        </div>
                        <div>
                            <x-label>Selecione uma nova Categoria:</x-label>
                            <select name="categoria_id">
                                @foreach($categorias as $c)
                                <option value="{{$c->id}}"
                                @if($c->id == $produto->categoria->id)
                                    selected
                                @endif
                                >{{$c->descricao}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-label>Selecione um novo Fornecedor:</x-label>
                            <select name="forncedor_id">
                                @foreach($forncedors as $f)
                                <option value="{{$f->id}}"
                                @if($f->id == $produto->forncedor->id)
                                    selected
                                @endif
                                >{{$f->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-5">
                            <x-button>Alterar</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>

