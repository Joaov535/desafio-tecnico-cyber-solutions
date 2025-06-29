<table class="min-w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-100">
            <th @click="setSort('nome')" class="cursor-pointer p-2 border border-gray-300">
                Nome <div class="float-end">⇅</div>
            </th>
            <th @click="setSort('email')" class="cursor-pointer p-2 border border-gray-300">
                Email <div class="float-end">⇅</div>
            </th>
            <th @click="setSort('cpf')" class="cursor-pointer p-2 border border-gray-300">
                CPF <div class="float-end">⇅</div>
            </th>
            <th @click="setSort('cargo')" class="cursor-pointer p-2 border border-gray-300">
                Cargo <div class="float-end">⇅</div>
            </th>
            <th @click="setSort('dataAdmissao')" class="cursor-pointer p-2 border border-gray-300">
                Data Admissão <div class="float-end">⇅</div>
            </th>
        </tr>
    </thead>
    <tbody>
        <template x-for="employee in filteredEmployees" :key="employee.cpf">
            <tr class="hover:bg-gray-50 border border-gray-300 cursor-pointer" @click="openModal(employee)">
                <td class="p-2 border border-gray-300" x-text="employee.nome"></td>
                <td class="p-2 border border-gray-300" x-text="employee.email"></td>
                <td class="p-2 border border-gray-300" x-text="employee.cpf"></td>
                <td class="p-2 border border-gray-300" x-text="employee.cargo ?? '-'"></td>
                <td class="p-2 border border-gray-300" x-text="employee.dataAdmissao ?? '-'"></td>
            </tr>
        </template>
        <template x-if="filteredEmployees.length === 0 && !loading">
            <tr>
                <td colspan="5" class="text-center p-4 text-gray-500">Nenhum funcionário encontrado.</td>
            </tr>
        </template>
    </tbody>
</table>
@include('system.partials.modal-employee-info')
