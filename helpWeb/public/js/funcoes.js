document.addEventListener('DOMContentLoaded', function () {
    const cepInput = document.getElementById('n_cep');

    if (!cepInput) {
        console.warn('Campo #n_cep não encontrado.');
        return;
    }

    // ✅ Aplica a máscara de CEP: 99999-999
    if (window.Inputmask) {
        Inputmask("99999-999").mask(cepInput);
    } else {
        console.error('Inputmask não carregado.');
    }

    // ✅ Busca endereço ao sair do campo
    cepInput.addEventListener('blur', async function () {
        const cep = this.value.replace(/\D/g, '');

        if (cep.length !== 8) {
            alert("CEP inválido. Deve conter 8 dígitos.");
            return;
        }

        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (data.erro) {
                alert("CEP não encontrado.");
                return;
            }

            document.getElementById('c_endereco').value = data.logradouro || '';
            document.getElementById('c_bairo').value = data.bairro || '';
            document.getElementById('c_cidade').value = data.localidade || '';
            document.getElementById('c_estado').value = data.uf || '';

        } catch (error) {
            console.error("Erro ao buscar o endereço:", error);
            alert("Erro ao buscar o endereço.");
        }
    });
});
