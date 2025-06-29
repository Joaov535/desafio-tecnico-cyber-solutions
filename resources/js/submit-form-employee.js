import axios from 'axios'

export default function submitFormEmployees() {
    return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        form: {
            nome: '',
            email: '',
            cpf: '',
            cargo: '',
            dataAdmissao: '',
            salario: '',
        },
        errors: {},
        async submitForm() {
            this.form.cpf = this.form.cpf.replace(/\D/g, '')

            if (Number(this.form.salario) == NaN) {
                this.form.salario = null
            } else {
                this.form.salario = Number((this.form.salario).replace(',', '.'))
            }

            this.errors = {}

            try {
                const response = await axios.post('/employee', this.form, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': this.csrf,
                    }
                })

                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: response.data.message,
                    showConfirmButton: false,
                    timer: 1500
                })
                console.log(response.data)

                this.form = {
                    nome: '',
                    email: '',
                    cpf: '',
                    cargo: '',
                    dataAdmissao: '',
                    salario: '',
                }
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.errors
                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Algo de errado aconteceu",
                        footer: '<p>Verifique os dados e tente novamente</p>'
                    })
                    console.error(error)
                }
            }
        }
    }
}
