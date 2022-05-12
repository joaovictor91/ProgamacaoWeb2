<x-app-layout>
    <x-slot name="header">
        Nova Categoria
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('categoria.store')}}" method="post">
                        @csrf
                        <div>
                            <x-label>Informe a descricao:</x-label>
                            <x-input name="descricao"
                                     class="block mt-1 w-full"/>
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

