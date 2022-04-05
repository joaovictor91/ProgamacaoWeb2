<x-app-layout>
    <x-slot name="header">
        Categorias
    </x-slot>

    <form action="{{ route('categoria.store') }}" method="post">
        @csrf
        <x-label>Informe a Descrição: </x-label>
        <x-input name="descricao"/>
        <x-button>Salvar</x-button>
    </form>

</x-app-layout>
