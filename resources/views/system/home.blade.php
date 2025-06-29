@extends('system.layouts.main')

@section('title', 'Home')

@section('content')
    <main class="w-[95%] h-[85vh] bg-white rounded-xl shadow p-6">
        <div class="w-[100%] h-10 justify-center flex">
            <h1><strong>Gerenciar funcionários</strong></h1>
        </div>
        <div x-data="{ view: 'list' }" class="flex h-[90%] ">
            <aside class="w-40 h-[100%] align-middle pt-2 ">
                <button @click="view = 'form'" class="w-[100%] rounded-2xl bg-stone-900 text-white mb-1">Cadastrar</button>
                <button @click="view = 'list'" class="w-[100%] rounded-2xl bg-stone-900 text-white mb-1">Listar</button>
            </aside>

            <div class="content  w-[100%] h-[100%]" x-show="view === 'list'" x-transition>

            </div>
            <div x-show="view === 'form'" x-transition class="content  w-[100%] h-[100%]">
                <form x-data="submitFormFuncionarios()" @submit.prevent="submitForm" method="POST"
                    class="space-y-4 p-5 overflow-y-auto max-h-[67vh]">
                    <input type="hidden" name="_token" :value="csrf">

                    <div>
                        <label class="block text-sm font-medium">Nome:</label>
                        <input type="text" name="nome" x-model="form.nome" class="border rounded p-2 w-full" required>
                        <template x-if="errors.nome">
                            <p class="text-red-600 text-sm mt-1" x-text="errors.nome[0]"></p>
                        </template>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Email:</label>
                        <input type="email" name="email" x-model="form.email" class="border rounded p-2 w-full"
                            required>
                        <template x-if="errors.email">
                            <p class="text-red-600 text-sm mt-1" x-text="errors.email[0]"></p>
                        </template>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">CPF:</label>
                        <input type="text" name="cpf" x-model="form.cpf" x-mask="999.999.999-99"
                            class="border rounded p-2 w-full" required>
                        <template x-if="errors.cpf">
                            <p class="text-red-600 text-sm mt-1" x-text="errors.cpf[0]"></p>
                        </template>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Cargo:</label>
                        <input type="text" name="cargo" x-model="form.cargo" class="border rounded p-2 w-full">
                        <template x-if="errors.cargo">
                            <p class="text-red-600 text-sm mt-1" x-text="errors.cargo[0]"></p>
                        </template>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Admissão:</label>
                        <input type="date" name="dataAdmissao" x-model="form.dataAdmissao"
                            class="border rounded p-2 w-full">
                        <template x-if="errors.dataAdmissao">
                            <p class="text-red-600 text-sm mt-1" x-text="errors.dataAdmissao[0]"></p>
                        </template>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Salario:</label>
                        <input type="text" name="salario" x-model="form.salario" class="border rounded p-2 w-full"
                            x-mask:dynamic="$money($input, ',', '',2)">
                        <template x-if="errors.salario">
                            <p class="text-red-600 text-sm mt-1" x-text="errors.salario[0]"></p>
                        </template>
                    </div>

                    <button type="submit" class="bg-stone-900 text-white  px-4 py-2 rounded">
                        Enviar
                    </button>
                </form>

            </div>
        </div>
    </main>
@endsection
