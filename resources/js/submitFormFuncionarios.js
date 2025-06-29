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
        async submitForm() {
            this.form.cpf = this.form.cpf.replace(/\D/g, '')

            try {
                const response = await fetch('/funcionario', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.csrf,
                    },
                    body: JSON.stringify(this.form),
                });

                if (!response.ok) {
                    const errorData = await response.json()
                    throw errorData
                }

                const data = await response.json()
                alert('Enviado com sucesso!')
                console.log(data);

                this.form.nome = ''
                this.form.email = ''
                this.form.cpf = ''
                this.form.cargo = ''
                this.form.admissao = ''
                this.form.salario = ''
            } catch (error) {
                alert('Erro ao enviar o formulário')
                console.error(error)
            }
        }
    };
}
