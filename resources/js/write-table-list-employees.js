import axios from 'axios'

export default function writeTableListEmployees() {
    return {
        employees: [],
        filtro: '',
        sortColumn: 'nome',
        sortAsc: true,
        loading: false,
        selectedEmployee: null,
        showModal: false,

        init() {
            this.loadEmployees()
        },

        async loadEmployees() {
            this.loading = true
            try {
                const response = await axios.get('/employees')
                this.employees = response.data
            } catch (error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Falha ao carregar lista de funcionários",
                })
                console.error('Falha ao carregar funcionários:', error)
            } finally {
                this.loading = false
            }
        },

        setSort(coluna) {
            if (this.sortColumn === coluna) {
                this.sortAsc = !this.sortAsc
            } else {
                this.sortColumn = coluna
                this.sortAsc = true
            }
        },

        openModal(employee) {
            this.selectedEmployee = employee
            this.showModal = true
        },

        closeModal() {
            this.showModal = false
            this.selectedEmployee = null
        },

        // async deleteEmployee() {
        //     if (!this.selectedEmployee?.cpf) return

        //     // Swal.fire({
        //     //     title: "Deseja deletar o funcionário?",
        //     //     showCancelButton: true,
        //     //     confirmButtonText: "Sim",
        //     //     cancelButtonText: "Cancelar"
        //     // }).then(async (result) => {
        //     //     if (result.isConfirmed) {
        //     //         try {
        //     //             const response = await axios.delete(`/api/funcionarios/${this.selectedEmployee.cpf}`)

        //     //             this.funcionarios = this.funcionarios.filter(f => f.cpf !== this.selectedEmployee.cpf)
        //     //             this.closeModal()

        //     //             Swal.fire({
        //     //                 position: "center",
        //     //                 icon: "success",
        //     //                 title: response.data.message,
        //     //                 showConfirmButton: false,
        //     //                 timer: 1500
        //     //             })
        //     //         } catch (error) {
        //     //             console.error("Erro ao excluir funcionário:", error)
        //     //             Swal.fire({
        //     //                 icon: "error",
        //     //                 title: "Oops...",
        //     //                 text: "Algo de errado aconteceu",
        //     //                 footer: '<p>Tente novamente mais tarde</p>'
        //     //             })
        //     //         }
        //     //     }

        //     //     return
        //     // })


        // },

        get filteredEmployees() {
            let res = [...this.employees]

            if (this.filtro.trim() !== '') {
                const busca = this.filtro.toLowerCase()

                res = res.filter(f =>
                    (f.nome && f.nome.toLowerCase().includes(busca)) ||
                    (f.email && f.email.toLowerCase().includes(busca)) ||
                    (f.cpf && f.cpf.toLowerCase().includes(busca)) ||
                    (f.cargo && f.cargo.toLowerCase().includes(busca)) ||
                    (f.dataAdmissao && f.dataAdmissao.includes(busca))
                )
            }

            if (this.sortColumn) {
                res.sort((a, b) => {

                    let valA = a[this.sortColumn] ?? ''
                    let valB = b[this.sortColumn] ?? ''

                    if (this.sortColumn === 'dataAdmissao') {

                        valA = new Date(valA)

                        valB = new Date(valB)
                    } else {
                        valA = valA.toString().toLowerCase()
                        valB = valB.toString().toLowerCase()
                    }

                    if (valA < valB) {
                        return this.sortAsc ? -1 : 1
                    }
                    if (valA > valB) {

                        return this.sortAsc ? 1 : -1
                    }
                    return 0
                })
            }

            return res
        }
    }
}
