<div class="fixed inset-0 backdrop-blur-sm bg-amber-100 flex items-center justify-center z-50" x-show="showModal"
    x-transition>
    <div class="bg-white rounded-lg shadow-xl p-6 w-100 relative">
        <button class="absolute top-2 right-3 text-amber-900 hover:text-black cursor-pointer"
            @click="closeModal()">✖</button>
        <h2 class="text-lg font-bold mb-4">Detalhes do Funcionário</h2>
        <p><strong>Nome:</strong> <span x-text="selectedEmployee?.nome"></span></p>
        <p><strong>Email:</strong> <span x-text="selectedEmployee?.email"></span></p>
        <p><strong>CPF:</strong> <span x-text="selectedEmployee?.cpf"></span></p>
        <p><strong>Cargo:</strong> <span x-text="selectedEmployee?.cargo ?? '-'"></span></p>
        <p class="mb-5"><strong>Data Admissão:</strong> <span x-text="selectedEmployee?.dataAdmissao ?? '-'"></span>
        </p>
        <button class="bg-blue-400 text-white w-[49%]  px-4 py-2 rounded cursor-pointer">
            Editar
        </button>
        <button class="bg-red-800 text-white w-[49%]  px-4 py-2 rounded cursor-pointer" @click="deleteEmployee()">
            Excuir
        </button>
    </div>
</div>
