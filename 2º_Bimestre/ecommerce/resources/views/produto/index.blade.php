<x-app-layout>
    <x-slot name="header">
        Todos os Produtos
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    @if(session('resposta'))
                        {{session('resposta')}}
                    @endif

                </div>
                <div class="flex items-center mt-4 mb-10">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" href="{{ route('produto.create')}}" >Novo Registro</a>
                </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descrição
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Categoria
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fornecedor
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produtos as $p)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{$p->nome}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$p->descricao}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$p->categoria->descricao}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$p->forncedor->nome}}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{route('produto.edit', $p->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Alterar</a>
                                    <form action="{{route('produto.destroy', $p->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" >
                                            Excluir
                                        </button>
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
