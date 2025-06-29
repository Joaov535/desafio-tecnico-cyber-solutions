import axios from 'axios';

export default function submitFormFuncionarios() {
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
            this.form.cpf = this.form.cpf.replace(/\D/g, '');

            if (Number(this.form.salario) == NaN) {
                this.form.salario = null;
            } else {
                this.form.salario = Number((this.form.salario).replace(',', '.'));
            }

            this.errors = {};

            try {
                const response = await axios.post('/funcionario', this.form, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': this.csrf,
                    }
                });

                alert('Enviado com sucesso!');
                console.log(response.data);

                this.form = {
                    nome: '',
                    email: '',
                    cpf: '',
                    cargo: '',
                    dataAdmissao: '',
                    salario: '',
                };
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.errors;
                } else {
                    alert('Erro ao enviar o formulário');
                    console.error(error);
                }
            }
        }
    };
}
