@extends('system.layouts.main')

@section('title', 'Home')

@section('content')
    <main class="w-[95%] h-[85vh] bg-white rounded-xl shadow p-6">
        <div class="w-[100%] h-10 justify-center flex">
            <h1><strong>Gerenciar funcionários</strong></h1>
        </div>
        <div x-data="{ view: 'list' }" class="flex h-[90%] ">
            <aside class="w-40 h-[100%] pt-2 ">
                <button @click="view = 'list'"
                    class="w-[100%] rounded bg-amber-900 text-white mb-2 h-8 cursor-pointer">Listar</button>
                <button @click="view = 'form'"
                    class="w-[100%] rounded bg-amber-900 text-white mb-2 h-8 cursor-pointer">Cadastrar</button>
            </aside>

            <div x-data="writeTableListEmployees()" class="content  w-[100%] h-[100%] p-10" x-show="view === 'list'" x-transition
                x-init="init()">
                <input type="text" placeholder="Buscar..." x-model="filtro"
                    class="mb-4 p-2 border rounded w-80 max-w-md" />

                <template x-if="loading">
                    <div class="mb-2 text-gray-500">Carregando...</div>
                </template>

                <div class="overflow-auto max-w-full h-full">
                    @include('system.partials.table-list-employees')
                </div>
            </div>
            <div x-show="view === 'form'" x-transition class="content  w-[100%] h-[100%]">
                <div class="overflow-auto max-w-full h-full">
                    @include('system.partials.form-employee')
                </div>
            </div>
        </div>
    </main>
@endsection
