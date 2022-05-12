<x-app-layout>
    <x-slot name="header">
        Todas as Categorias
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex items-center mt-4 mb-10">
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" href="{{ route('categoria.create')}}" >Novo Registro</a>
                    </div>
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3
                                rounded-bl-lg rounded-br-lg mt-8 ">
                        <table class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500
                                            tracking-wider">Descrição</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500
                                            tracking-wider"></th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-lg leading-4 text-black-500
                                            tracking-wider"></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categorias as $c)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-gray-900 border-gray-500 text-sm
                                            leading-5">{{$c->descricao}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5 text-right ">
                                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" href="{{ route('categoria.edit', $c->id)}}" >
                                            Alterar
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5 text-right ">
                                        <form action="{{route('categoria.destroy', $c->id)}}" method="POST">
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
