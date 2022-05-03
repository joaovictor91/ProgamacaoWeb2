<x-app-layout>
    <x-slot name="header">
        Editar Fornecedor
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('fornecedor.update',$fornecedor->id)}}" method="post">
                        @csrf
                        @method("PATCH")
                        <div>
                            <x-label>Informe o Nome:</x-label>
                            <x-input name="nome"  value="{{$fornecedor->nome}}"
                                     class="block mt-1 w-full"/>

                            <x-label>Informe o Telefone:</x-label>
                            <x-input name="telefone" value="{{$fornecedor->telefone}}"
                                     class="block mt-1 w-full"/>

                            <x-label>Informe o Logadouro:</x-label>
                            <x-input name="logadouro" value="{{$fornecedor->logadouro}}"
                                     class="block mt-1 w-full"/>
                        </div>
                        <div>
                            <x-label>Informe o CEP:</x-label>
                            <x-input name="cep" value="{{$fornecedor->cep}}"
                                     class="block mt-1 w-full"/>

                            <x-label>Informe a Cidade:</x-label>
                            <x-input name="cidade" value="{{$fornecedor->cidade}}"
                                     class="block mt-1 w-full"/>

                            <x-label>Informe o Estado:</x-label>
                            <x-input name="estado" value="{{$fornecedor->estado}}"
                                     class="block mt-1 w-full"/>
                        </div>
                        <div>
                            <x-label>Informe o nome fantasia:</x-label>
                            <x-input name="nome_fantasia" value="{{$fornecedor->nome_fantasia}}"
                                     class="block mt-1 w-full"/>
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

